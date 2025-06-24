@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Member</h1>
    @php
        $user = Auth::user();
        $isAdmin = $user && $user->isAdmin();
        $cells = \App\Models\Cell::orderBy('name')->get();
        $folds = \App\Models\Fold::orderBy('name')->get();
    @endphp
    <form action="{{ route('members.update', $member) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $member->name) }}" required>
        </div>
        <div>
            <label class="block font-medium">Gender</label>
            <select name="gender" class="w-full border rounded px-3 py-2">
                <option value="">Select</option>
                <option value="male" @if(old('gender', $member->gender)=='male') selected @endif>Male</option>
                <option value="female" @if(old('gender', $member->gender)=='female') selected @endif>Female</option>
            </select>
        </div>
        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone', $member->phone) }}">
        </div>
        <div>
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="first_timer" @if(old('status', $member->status)=='first_timer') selected @endif>First Timer</option>
                <option value="associate" @if(old('status', $member->status)=='associate') selected @endif>Associate</option>
                <option value="member" @if(old('status', $member->status)=='member') selected @endif>Member</option>
            </select>
        </div>
        <div>
            <label class="block font-medium">Invited By (Member ID)</label>
            <input type="number" name="invited_by" class="w-full border rounded px-3 py-2" value="{{ old('invited_by', $member->invited_by) }}">
        </div>
        <div>
            <label class="block font-medium">First Visit Date</label>
            <input type="date" name="first_visit_date" class="w-full border rounded px-3 py-2" value="{{ old('first_visit_date', $member->first_visit_date) }}">
        </div>
        <div>
            <label class="block font-medium">Notes</label>
            <textarea name="notes" class="w-full border rounded px-3 py-2">{{ old('notes', $member->notes) }}</textarea>
        </div>
        @if($isAdmin)
            <div>
                <label class="block font-medium">Assign as Cell Leader</label>
                <select name="cell_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    @foreach($cells as $cell)
                        <option value="{{ $cell->id }}" @if(old('cell_leader_of', $cell->cell_leader_id)==$member->id) selected @endif>{{ $cell->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium">Assign as Assistant Cell Leader</label>
                <select name="assistant_cell_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    @foreach($cells as $cell)
                        <option value="{{ $cell->id }}" @if(old('assistant_cell_leader_of', $cell->assistant_leader_id)==$member->id) selected @endif>{{ $cell->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium">Assign as Fold Leader</label>
                <select name="fold_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    @foreach($folds as $fold)
                        <option value="{{ $fold->id }}" @if(old('fold_leader_of', $fold->fold_leader_id)==$member->id) selected @endif>{{ $fold->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium">Assign as Assistant Fold Leader</label>
                <select name="assistant_fold_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    @foreach($folds as $fold)
                        <option value="{{ $fold->id }}" @if(old('assistant_fold_leader_of', $fold->assistant_leader_id)==$member->id) selected @endif>{{ $fold->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="flex justify-between">
            <a href="{{ route('members.index') }}" class="text-gray-600">Cancel</a>
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Update</button>
        </div>
    </form>
</div>
@endsection 