@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Register First Timer</h1>
        <a href="{{ route('first_timers.index') }}" class="text-gray-600 hover:text-gray-800">← Back to First Timers</a>
    </div>

    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('first_timers.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Contact Number *</label>
                    <input type="tel" name="phone" id="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('phone') }}" required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="residence" class="block text-sm font-medium text-gray-700 mb-2">Residence/Address</label>
                    <input type="text" name="residence" id="residence" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('residence') }}" placeholder="Enter full address">
                    @error('residence')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Visit Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">Purpose of Visit *</label>
                    <select name="purpose" id="purpose" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                        <option value="">Select Purpose</option>
                        <option value="visit" @if(old('purpose') == 'visit') selected @endif>Visit</option>
                        <option value="stay" @if(old('purpose') == 'stay') selected @endif>Stay (Join Church)</option>
                    </select>
                    @error('purpose')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="first_visit_date" class="block text-sm font-medium text-gray-700 mb-2">First Visit Date</label>
                    <input type="date" name="first_visit_date" id="first_visit_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('first_visit_date', date('Y-m-d')) }}">
                    @error('first_visit_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="service_id" class="block text-sm font-medium text-gray-700 mb-2">Service Attended *</label>
                    <select name="service_id" id="service_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                        <option value="">Select Service</option>
                        @foreach($allServices as $service)
                            <option value="{{ $service['id'] ?? $service->id }}" @if(old('service_id') == ($service['id'] ?? $service->id)) selected @endif>
                                {{ $service['name'] ?? $service->name }} - {{ \Carbon\Carbon::parse($service['service_date'] ?? $service->service_date)->format('D, d M Y') }}
                                @if(isset($service['is_auto_generated']) && $service['is_auto_generated'])
                                    (Auto-generated)
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="inviter_search" class="block text-sm font-medium text-gray-700 mb-2">Invited By (Search Member)</label>
                <div class="relative">
                    <input type="text" id="inviter_search" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Start typing member name..." autocomplete="off">
                    <input type="hidden" name="invited_by" id="invited_by" value="{{ old('invited_by') }}">
                    <div id="search_results" class="absolute z-10 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-y-auto hidden"></div>
                </div>
                <div id="selected_inviter" class="mt-2 p-2 bg-green-50 border border-green-200 rounded-md hidden">
                    <span class="text-sm text-green-700">Selected: <span id="inviter_name"></span></span>
                    <button type="button" id="clear_inviter" class="ml-2 text-red-600 hover:text-red-800 text-sm">Clear</button>
                </div>
                @error('invited_by')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Additional Information</h3>
            
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                <textarea name="notes" id="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Any additional notes about the first timer">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('first_timers.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500">Register First Timer</button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inviterSearch = document.getElementById('inviter_search');
    const invitedBy = document.getElementById('invited_by');
    const searchResults = document.getElementById('search_results');
    const selectedInviter = document.getElementById('selected_inviter');
    const inviterName = document.getElementById('inviter_name');
    const clearInviter = document.getElementById('clear_inviter');
    let searchTimeout;

    inviterSearch.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        if (query.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/api/members/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(member => {
                            const div = document.createElement('div');
                            div.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                            div.textContent = member.name;
                            div.addEventListener('click', () => selectInviter(member));
                            searchResults.appendChild(div);
                        });
                        searchResults.classList.remove('hidden');
                    } else {
                        searchResults.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error searching members:', error);
                    searchResults.classList.add('hidden');
                });
        }, 300);
    });

    function selectInviter(member) {
        invitedBy.value = member.id;
        inviterName.textContent = member.name;
        inviterSearch.value = member.name;
        selectedInviter.classList.remove('hidden');
        searchResults.classList.add('hidden');
    }

    clearInviter.addEventListener('click', function() {
        invitedBy.value = '';
        inviterSearch.value = '';
        selectedInviter.classList.add('hidden');
    });

    // Hide search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!inviterSearch.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
});
</script>
@endpush 