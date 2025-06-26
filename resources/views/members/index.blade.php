@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 font-montserrat">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-[#3a1d09]">Members</h1>
        <x-primary-button>{{ __('Add Member') }}</x-primary-button>
    </div>
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-[#3a1d09] rounded-lg shadow">
            <thead class="bg-[#f58502]">
                <tr>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Name</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Gender</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Phone</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Status</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Cell</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Fold</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">First Visit</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Leader Role</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-orange-100">
                @foreach($members as $member)
                <tr>
                    <td class="px-4 py-2 border">{{ $member->name }}</td>
                    <td class="px-4 py-2 border">{{ $member->gender }}</td>
                    <td class="px-4 py-2 border">{{ $member->phone }}</td>
                    <td class="px-4 py-2 border">{{ ucfirst($member->status) }}</td>
                    <td class="px-4 py-2 border">{{ $member->cell->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $member->fold->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $member->first_visit_date }}</td>
                    <td class="px-4 py-2 border">
                        @php
                            $roles = [];
                            if ($member->ledCell) $roles[] = 'Cell Leader';
                            if ($member->assistantLedCell) $roles[] = 'Assistant Cell Leader';
                            if ($member->ledFold) $roles[] = 'Fold Leader';
                            if ($member->assistantLedFold) $roles[] = 'Assistant Fold Leader';
                        @endphp
                        @if(count($roles))
                            <span class="text-green-700 font-semibold">{{ implode(', ', $roles) }}</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
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