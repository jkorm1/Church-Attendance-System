<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use App\Models\Service;
use App\Services\ServiceGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AttendanceController extends Controller
{
    protected $serviceGenerator;

    public function __construct(ServiceGeneratorService $serviceGenerator)
    {
        $this->serviceGenerator = $serviceGenerator;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($service_id)
    {
        // Check authorization
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isCellLeader() && !$user->isFoldLeader()) {
            abort(403, 'You do not have permission to access attendance.');
        }

        try {
            // Check if it's an auto-generated service
            if (str_starts_with($service_id, 'auto_')) {
                // Handle auto-generated service
                $service = $this->serviceGenerator->parseServiceId($service_id);
                if (!$service) {
                    abort(404, 'Service not found');
                }
                $service = (object) $service;
            } else {
                // Handle database service
                $service = Service::findOrFail($service_id);
            }
            
            // Filter members based on user's role and leadership
            if ($user->isAdmin()) {
                $members = Member::orderBy('name')->get();
            } elseif ($user->isCellLeader()) {
                $cell = $user->getLedCell();
                $members = $cell ? $cell->members()->orderBy('name')->get() : collect([]);
            } elseif ($user->isFoldLeader()) {
                $fold = $user->getLedFold();
                $members = $fold ? $fold->members()->orderBy('name')->get() : collect([]);
            } else {
                $members = collect([]);
            }
            
            $attendance = Attendance::where('service_id', $service_id)->pluck('present', 'member_id');
            
            return view('attendance.index', compact('service', 'members', 'attendance'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error loading attendance: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::orderBy('service_date', 'desc')->get();
        $members = Member::orderBy('name')->get();
        
        return view('attendance.create', compact('services', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|string',
            'member_id' => 'required|exists:members,id',
            'present' => 'required|boolean',
        ]);

        try {
            Attendance::updateOrCreate(
                [
                    'service_id' => $request->service_id,
                    'member_id' => $request->member_id,
                ],
                [
                    'present' => $request->present,
                ]
            );

            return back()->with('success', 'Attendance recorded successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error recording attendance: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $services = Service::orderBy('service_date', 'desc')->get();
        $members = Member::orderBy('name')->get();
        
        return view('attendance.edit', compact('attendance', 'services', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'service_id' => 'required|string',
            'member_id' => 'required|exists:members,id',
            'present' => 'required|boolean',
        ]);

        try {
            $attendance->update([
                'service_id' => $request->service_id,
                'member_id' => $request->member_id,
                'present' => $request->present,
            ]);

            return redirect()->route('attendance.index', $request->service_id)
                           ->with('success', 'Attendance updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating attendance: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        try {
            $service_id = $attendance->service_id;
            $attendance->delete();
            
            return redirect()->route('attendance.index', $service_id)
                           ->with('success', 'Attendance record deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting attendance: ' . $e->getMessage());
        }
    }

    // Mark a member as present for a service
    public function present($service_id, $member_id)
    {
        // Check authorization
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isCellLeader() && !$user->isFoldLeader()) {
            abort(403, 'You do not have permission to mark attendance.');
        }

        try {
            Attendance::updateOrCreate(
                [
                    'service_id' => $service_id,
                    'member_id' => $member_id,
                ],
                [
                    'present' => true,
                ]
            );
            return back()->with('success', 'Marked present!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error marking present: ' . $e->getMessage());
        }
    }

    // Mark a member as absent for a service
    public function absent($service_id, $member_id)
    {
        // Check authorization
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isCellLeader() && !$user->isFoldLeader()) {
            abort(403, 'You do not have permission to mark attendance.');
        }

        try {
            Attendance::updateOrCreate(
                [
                    'service_id' => $service_id,
                    'member_id' => $member_id,
                ],
                [
                    'present' => false,
                ]
            );
            return back()->with('success', 'Marked absent!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error marking absent: ' . $e->getMessage());
        }
    }

    // Bulk update attendance for multiple members
    public function bulkUpdate(Request $request, $service_id)
    {
        // Check authorization
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isCellLeader() && !$user->isFoldLeader()) {
            abort(403, 'You do not have permission to update attendance.');
        }

        $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'boolean',
        ]);

        try {
            DB::beginTransaction();
            
            foreach ($request->attendance as $member_id => $present) {
                Attendance::updateOrCreate(
                    [
                        'service_id' => $service_id,
                        'member_id' => $member_id,
                    ],
                    [
                        'present' => $present,
                    ]
                );
            }
            
            DB::commit();
            return back()->with('success', 'Attendance updated for all members!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error updating attendance: ' . $e->getMessage());
        }
    }

    // Finalize attendance: mark all unmarked members as absent
    public function finalize($service_id)
    {
        // Check authorization
        $user = auth()->user();
        if (!$user->isAdmin() && !$user->isCellLeader() && !$user->isFoldLeader()) {
            abort(403, 'You do not have permission to finalize attendance.');
        }

        try {
            DB::beginTransaction();
            
            // Get members based on user's role
            if ($user->isAdmin()) {
                $members = Member::pluck('id');
            } elseif ($user->isCellLeader()) {
                $cell = $user->getLedCell();
                $members = $cell ? $cell->members()->pluck('id') : collect([]);
            } elseif ($user->isFoldLeader()) {
                $fold = $user->getLedFold();
                $members = $fold ? $fold->members()->pluck('id') : collect([]);
            } else {
                $members = collect([]);
            }
            
            $marked = Attendance::where('service_id', $service_id)->pluck('member_id');
            $absent = $members->diff($marked);
            
            foreach ($absent as $member_id) {
                Attendance::create([
                    'service_id' => $service_id,
                    'member_id' => $member_id,
                    'present' => false,
                ]);
            }
            
            DB::commit();
            return back()->with('success', 'Attendance finalized! All unmarked members marked as absent.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error finalizing attendance: ' . $e->getMessage());
        }
    }

    // Get attendance statistics for a service
    public function statistics($service_id)
    {
        try {
            $totalMembers = Member::count();
            $presentCount = Attendance::where('service_id', $service_id)
                                    ->where('present', true)
                                    ->count();
            $absentCount = Attendance::where('service_id', $service_id)
                                   ->where('present', false)
                                   ->count();
            $unmarkedCount = $totalMembers - $presentCount - $absentCount;
            
            $attendanceRate = $totalMembers > 0 ? round(($presentCount / $totalMembers) * 100, 2) : 0;
            
            return response()->json([
                'total_members' => $totalMembers,
                'present' => $presentCount,
                'absent' => $absentCount,
                'unmarked' => $unmarkedCount,
                'attendance_rate' => $attendanceRate,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Export attendance data for a service
    public function export($service_id)
    {
        try {
            // Check if it's an auto-generated service
            if (str_starts_with($service_id, 'auto_')) {
                $service = $this->serviceGenerator->parseServiceId($service_id);
                if (!$service) {
                    abort(404, 'Service not found');
                }
                $service = (object) $service;
            } else {
                $service = Service::findOrFail($service_id);
            }

            $attendance = Attendance::where('service_id', $service_id)
                                  ->with('member')
                                  ->get();

            // Generate CSV content
            $csv = "Member Name,Status\n";
            foreach ($attendance as $record) {
                $status = $record->present ? 'Present' : 'Absent';
                $csv .= "\"{$record->member->name}\",{$status}\n";
            }

            $filename = "attendance_{$service_id}_" . date('Y-m-d_H-i-s') . ".csv";

            return response($csv)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', "attachment; filename={$filename}");
        } catch (\Exception $e) {
            return back()->with('error', 'Error exporting attendance: ' . $e->getMessage());
        }
    }
}
