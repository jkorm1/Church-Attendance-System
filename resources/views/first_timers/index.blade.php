@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-7xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">First Timers &amp; Follow-Up Department</h1>
        <a href="{{ route('first_timers.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Register First Timer</a>
    </div>

    {{-- Filter Form --}}
    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label for="service_id" class="block text-sm font-medium text-gray-700">Filter by Service</label>
            <select name="service_id" id="service_id" class="mt-1 block w-56 border-gray-300 rounded shadow-sm">
                <option value="">-- All Services --</option>
                @php
                    $serviceGenerator = app(\App\Services\ServiceGeneratorService::class);
                    $autoServices = collect($serviceGenerator->getAllServices(7));
                    $manualServices = \App\Models\Service::orderBy('service_date', 'desc')->get();
                    $allServices = $autoServices->merge($manualServices)->sortBy('service_date');
                @endphp
                @foreach($allServices as $service)
                    <option value="{{ $service['id'] ?? $service->id }}" @if(request('service_id') == ($service['id'] ?? $service->id)) selected @endif>
                        {{ $service['name'] ?? $service->name }} ({{ \Carbon\Carbon::parse($service['service_date'] ?? $service->service_date)->format('D, d M Y') }})
                        @if(isset($service['is_auto_generated']) && $service['is_auto_generated'])
                            (Auto)
                        @endif
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Or by Date</label>
            <input type="date" name="date" id="date" value="{{ request('date') }}" class="mt-1 block w-48 border-gray-300 rounded shadow-sm">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Filter</button>
            <a href="{{ route('first_timers.index') }}" class="ml-2 text-sm text-gray-600 underline">Reset</a>
        </div>
    </form>

    {{-- Summary Section --}}
    <div class="mb-6 p-4 bg-gray-50 rounded shadow">
        <div class="flex flex-wrap gap-8 items-center">
            <div>
                <div class="text-lg font-bold">Grand Total = {{ $total }}</div>
                <div class="text-green-700 font-semibold">Total Stay - {{ $stay }}</div>
                <div class="text-blue-700 font-semibold">Total Visit - {{ $visit }}</div>
            </div>
            @if($service)
                <div>
                    <div class="font-semibold">For: {{ is_array($service) ? $service['name'] : $service->name }}</div>
                    <div class="text-sm text-gray-600">{{ \Carbon\Carbon::parse(is_array($service) ? $service['service_date'] : $service->service_date)->format('D, d M Y') }}</div>
                </div>
            @elseif($date)
                <div>
                    <div class="font-semibold">For: {{ \Carbon\Carbon::parse($date)->format('D, d M Y') }}</div>
                </div>
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Date of Birth</th>
                    <th class="px-4 py-2 border">Contact</th>
                    <th class="px-4 py-2 border">Residence</th>
                    <th class="px-4 py-2 border">Purpose</th>
                    <th class="px-4 py-2 border">Service</th>
                    <th class="px-4 py-2 border">Invited By</th>
                    <th class="px-4 py-2 border">Cell</th>
                    <th class="px-4 py-2 border">Fold</th>
                    <th class="px-4 py-2 border">First Visit</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($firstTimers as $ft)
                <tr>
                    <td class="px-4 py-2 border">{{ $ft->name }}</td>
                    <td class="px-4 py-2 border">{{ $ft->date_of_birth ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $ft->phone }}</td>
                    <td class="px-4 py-2 border">{{ $ft->residence ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $ft->purpose == 'stay' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($ft->purpose ?? 'visit') }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border">{{ $ft->service_name }}</td>
                    <td class="px-4 py-2 border">{{ $ft->inviter->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $ft->cell->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $ft->fold->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $ft->first_visit_date }}</td>
                    <td class="px-4 py-2 border">
                        <form action="{{ route('first_timers.promote', $ft->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mb-2">Promote to Member</button>
                        </form>
                        <form action="{{ route('first_timers.destroy', $ft->id) }}" method="POST" onsubmit="return confirm('Delete this first timer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 