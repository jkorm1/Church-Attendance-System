@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-5xl">
    <h1 class="text-2xl font-bold mb-4">Members Overview</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Cell</th>
                    <th class="px-4 py-2 border">Fold</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="px-4 py-2 border">{{ $member->name }} <a href="{{ route('dashboard.members.detail', $member->id) }}" class="text-blue-600 hover:underline text-xs ml-2">View Analytics</a></td>
                    <td class="px-4 py-2 border">{{ $member->cell->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $member->fold->name ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 