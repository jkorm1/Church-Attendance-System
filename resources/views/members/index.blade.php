@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Members</h1>
        <a href="{{ route('members.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Add Member</a>
    </div>
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Gender</th>
                    <th class="px-4 py-2 border">Phone</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">First Visit</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="px-4 py-2 border">{{ $member->name }}</td>
                    <td class="px-4 py-2 border">{{ $member->gender }}</td>
                    <td class="px-4 py-2 border">{{ $member->phone }}</td>
                    <td class="px-4 py-2 border">{{ ucfirst($member->status) }}</td>
                    <td class="px-4 py-2 border">{{ $member->first_visit_date }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('members.edit', $member) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Delete this member?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $members->links() }}
    </div>
</div>
@endsection 