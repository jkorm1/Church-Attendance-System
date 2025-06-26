<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstTimer;
use App\Models\Member;
use App\Models\Cell;
use App\Models\Fold;
use App\Services\ServiceGeneratorService;
use Illuminate\Support\Facades\DB;

class FirstTimerController extends Controller
{
    protected $serviceGenerator;

    public function __construct(ServiceGeneratorService $serviceGenerator)
    {
        $this->serviceGenerator = $serviceGenerator;
    }

    /**
     * Display a listing of the first timers, optionally filtered by service or date.
     */
    public function index(Request $request)
    {
        $serviceId = $request->get('service_id');
        $date = $request->get('date');

        $query = FirstTimer::with(['inviter', 'cell', 'fold', 'service']);

        if ($serviceId) {
            // Filter by specific service
            $query->where('service_id', $serviceId);
        } elseif ($date) {
            // Filter by date (for backward compatibility)
            $query->whereDate('first_visit_date', $date);
        }

        $firstTimers = $query->orderByDesc('created_at')->get();

        // Summary stats
        $total = $firstTimers->count();
        $stay = $firstTimers->where('purpose', 'stay')->count();
        $visit = $firstTimers->where('purpose', 'visit')->count();

        // Get service info if filtering by service
        $service = null;
        if ($serviceId) {
            if (str_starts_with($serviceId, 'auto_')) {
                $service = $this->serviceGenerator->parseServiceId($serviceId);
            } else {
                $service = \App\Models\Service::find($serviceId);
            }
        }

        return view('first_timers.index', compact('firstTimers', 'total', 'stay', 'visit', 'serviceId', 'date', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get auto-generated services for the next 7 days
        $autoServices = collect($this->serviceGenerator->getAllServices(7));
        
        // Get manual services from database
        $manualServices = \App\Models\Service::orderBy('service_date', 'desc')->get();
        
        // Combine and sort by date
        $allServices = $autoServices->merge($manualServices)->sortBy('service_date');
        
        return view('first_timers.create', compact('allServices'));
    }

    /**
     * Store a newly created first timer in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'phone' => 'required|string|max:20',
            'residence' => 'nullable|string|max:255',
            'purpose' => 'required|in:visit,stay',
            'invited_by' => 'nullable|exists:members,id',
            'cell_id' => 'nullable|exists:cells,id',
            'fold_id' => 'nullable|exists:folds,id',
            'first_visit_date' => 'nullable|date',
            'service_id' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Validate service_id - check if it's a valid auto-generated service or database service
        $serviceId = $data['service_id'];
        $isValidService = false;
        
        if (str_starts_with($serviceId, 'auto_')) {
            // Check if it's a valid auto-generated service
            $parsedService = $this->serviceGenerator->parseServiceId($serviceId);
            if ($parsedService) {
                $isValidService = true;
            }
        } else {
            // Check if it's a valid database service
            $isValidService = \App\Models\Service::where('id', $serviceId)->exists();
        }
        
        if (!$isValidService) {
            return back()->withErrors(['service_id' => 'Invalid service selected.'])->withInput();
        }

        try {
            DB::beginTransaction();

            // If inviter is selected, get their cell and fold
            if (!empty($data['invited_by'])) {
                $inviter = Member::find($data['invited_by']);
                if ($inviter) {
                    $data['cell_id'] = $inviter->cell_id;
                    $data['fold_id'] = $inviter->fold_id;
                }
            }

            $firstTimer = FirstTimer::create($data);

            // If purpose is 'stay', also create a member but keep the first timer record
            if ($data['purpose'] === 'stay') {
                $member = Member::create([
                    'name' => $firstTimer->name,
                    'phone' => $firstTimer->phone,
                    'status' => 'member',
                    'invited_by' => $firstTimer->invited_by,
                    'cell_id' => $firstTimer->cell_id,
                    'fold_id' => $firstTimer->fold_id,
                    'first_visit_date' => $firstTimer->first_visit_date,
                    'notes' => "Converted from first timer. Original notes: " . ($firstTimer->notes ?? 'None'),
                ]);

                DB::commit();
                return redirect()->route('first_timers.index')->with('success', 'First timer registered and automatically converted to member! They appear in both lists.');
            }

            DB::commit();
            return redirect()->route('first_timers.index')->with('success', 'First timer registered successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error registering first timer: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Search members for the inviter selection
     */
    public function searchMembers(Request $request)
    {
        $query = $request->get('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $members = Member::where('name', 'like', "%{$query}%")
                        ->orWhere('phone', 'like', "%{$query}%")
                        ->select('id', 'name', 'phone')
                        ->limit(10)
                        ->get();

        return response()->json($members);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Promote a first timer to a member.
     */
    public function promote($id)
    {
        $firstTimer = FirstTimer::findOrFail($id);
        
        try {
            DB::beginTransaction();
            
            // Create member from first timer data
            $member = Member::create([
                'name' => $firstTimer->name,
                'phone' => $firstTimer->phone,
                'status' => 'member',
                'invited_by' => $firstTimer->invited_by,
                'cell_id' => $firstTimer->cell_id,
                'fold_id' => $firstTimer->fold_id,
                'first_visit_date' => $firstTimer->first_visit_date,
                'notes' => "Converted from first timer. Original notes: " . ($firstTimer->notes ?? 'None'),
            ]);
            
            $firstTimer->delete();
            
            DB::commit();
            return redirect()->back()->with('success', 'First timer promoted to member successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error promoting first timer: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified first timer from storage.
     */
    public function destroy($id)
    {
        $firstTimer = FirstTimer::findOrFail($id);
        $firstTimer->delete();
        return redirect()->back()->with('success', 'First timer deleted successfully.');
    }
}
