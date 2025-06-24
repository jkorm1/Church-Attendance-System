<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Cell;
use App\Models\Fold;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        
        // Filter members based on user's role and leadership
        if ($user->isAdmin()) {
            $members = Member::orderBy('name')->paginate(20);
        } elseif ($user->isCellLeader()) {
            $cell = $user->getLedCell();
            $members = $cell ? $cell->members()->orderBy('name')->paginate(20) : collect([]);
        } elseif ($user->isFoldLeader()) {
            $fold = $user->getLedFold();
            $members = $fold ? $fold->members()->orderBy('name')->paginate(20) : collect([]);
        } else {
            $members = collect([]);
        }
        
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|string',
            'invited_by' => 'nullable|exists:members,id',
            'first_visit_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'cell_leader_of' => 'nullable|exists:cells,id',
            'assistant_cell_leader_of' => 'nullable|exists:cells,id',
            'fold_leader_of' => 'nullable|exists:folds,id',
            'assistant_fold_leader_of' => 'nullable|exists:folds,id',
        ]);

        try {
            DB::beginTransaction();

            // If first timer and invited_by is set, assign cell and fold from inviter
            if ($data['status'] === 'first_timer' && !empty($data['invited_by'])) {
                $inviter = Member::find($data['invited_by']);
                if ($inviter) {
                    $data['cell_id'] = $inviter->cell_id;
                    $data['fold_id'] = $inviter->fold_id;
                }
            }

            // Create the member
            $member = Member::create($data);

            // Handle leadership assignments
            $this->handleLeadershipAssignment($member, $request);

            DB::commit();
            
            // Check if leader credentials were created
            if (session()->has('leader_credentials')) {
                $credentials = session('leader_credentials');
                session()->forget('leader_credentials');
                return redirect()->route('members.index')->with('success', 
                    "Member added successfully! Login credentials created for {$credentials['name']}: Email: {$credentials['email']}, Password: {$credentials['password']}");
            }
            
            return redirect()->route('members.index')->with('success', 'Member added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error creating member: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|string',
            'invited_by' => 'nullable|exists:members,id',
            'first_visit_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'cell_leader_of' => 'nullable|exists:cells,id',
            'assistant_cell_leader_of' => 'nullable|exists:cells,id',
            'fold_leader_of' => 'nullable|exists:folds,id',
            'assistant_fold_leader_of' => 'nullable|exists:folds,id',
        ]);

        try {
            DB::beginTransaction();

            // If first timer and invited_by is set, assign cell and fold from inviter
            if ($data['status'] === 'first_timer' && !empty($data['invited_by'])) {
                $inviter = Member::find($data['invited_by']);
                if ($inviter) {
                    $data['cell_id'] = $inviter->cell_id;
                    $data['fold_id'] = $inviter->fold_id;
                }
            }

            // Update the member
            $member->update($data);

            // Handle leadership assignments
            $this->handleLeadershipAssignment($member, $request);

            DB::commit();
            
            // Check if leader credentials were created
            if (session()->has('leader_credentials')) {
                $credentials = session('leader_credentials');
                session()->forget('leader_credentials');
                return redirect()->route('members.index')->with('success', 
                    "Member updated successfully! Login credentials created for {$credentials['name']}: Email: {$credentials['email']}, Password: {$credentials['password']}");
            }
            
            return redirect()->route('members.index')->with('success', 'Member updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error updating member: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }

    /**
     * Handle leadership assignment for a member
     */
    private function handleLeadershipAssignment(Member $member, Request $request)
    {
        // Check if admin is assigning leadership
        if (!auth()->user()->isAdmin()) {
            return;
        }

        // Handle cell leadership
        if ($request->filled('cell_leader_of')) {
            $cell = Cell::find($request->cell_leader_of);
            if ($cell) {
                $cell->update(['cell_leader_id' => $member->id]);
                $this->createUserForLeader($member, 'usher');
            }
        }

        if ($request->filled('assistant_cell_leader_of')) {
            $cell = Cell::find($request->assistant_cell_leader_of);
            if ($cell) {
                $cell->update(['assistant_leader_id' => $member->id]);
                $this->createUserForLeader($member, 'usher');
            }
        }

        // Handle fold leadership
        if ($request->filled('fold_leader_of')) {
            $fold = Fold::find($request->fold_leader_of);
            if ($fold) {
                $fold->update(['fold_leader_id' => $member->id]);
                $this->createUserForLeader($member, 'usher');
            }
        }

        if ($request->filled('assistant_fold_leader_of')) {
            $fold = Fold::find($request->assistant_fold_leader_of);
            if ($fold) {
                $fold->update(['assistant_leader_id' => $member->id]);
                $this->createUserForLeader($member, 'usher');
            }
        }
    }

    /**
     * Create a user account for a leader
     */
    private function createUserForLeader(Member $member, $role = 'usher')
    {
        // Check if user already exists
        $existingUser = User::where('email', $member->email ?? $member->name . '@church.com')->first();
        
        if (!$existingUser) {
            $email = $member->email ?? $member->name . '@church.com';
            $password = 'password123'; // Default password
            
            $user = User::create([
                'name' => $member->name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $user->assignRole($role);
            
            // Store success message with login credentials
            session()->flash('leader_credentials', [
                'name' => $member->name,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ]);
        }
    }
}
