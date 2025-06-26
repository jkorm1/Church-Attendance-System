@extends('layouts.app')

@section('content')
    <div class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Welcome to AEMS</h3>
                    <p class="text-gray-600">Church Attendance & Event Management System</p>
                    <p class="text-sm text-gray-500 mt-1">Today is {{ \Carbon\Carbon::now()->format('l, F j, Y') }}</p>
                </div>
            </div>

            <!-- Main Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Total Members</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $totalMembers }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Active Members</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $activeMembers }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Upcoming Services</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $upcomingServiceCount }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Attendance Records</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $totalAttendance }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- First Timers & Conversions Analytics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3 1.343 3 3 3 3-1.343 3-3zm6 0c0-1.657-1.343-3-3-3s-3 1.343-3 3 1.343 3 3 3 3-1.343 3-3z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">First Timers (Total)</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $firstTimersAnalytics['total'] }}</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    This Month: {{ $firstTimersAnalytics['this_month'] }} | 
                                    This Year: {{ $firstTimersAnalytics['this_year'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">New Members (Converted)</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $newMembersAnalytics['this_month'] }}</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    This Month | Total: {{ $newMembersAnalytics['total_new'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Conversion Rate</div>
                                <div class="text-2xl font-semibold text-gray-900">{{ $conversionAnalytics['monthly_rate'] }}%</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    This Month | Yearly: {{ $conversionAnalytics['yearly_rate'] }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Time-based Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">This Week</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">First Timers:</span>
                                <span class="font-semibold">{{ $weeklyStats['first_timers'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Conversions:</span>
                                <span class="font-semibold text-green-600">{{ $weeklyStats['conversions'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Attendance:</span>
                                <span class="font-semibold">{{ $weeklyStats['attendance'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">This Month</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">First Timers:</span>
                                <span class="font-semibold">{{ $monthlyStats['first_timers'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Conversions:</span>
                                <span class="font-semibold text-green-600">{{ $monthlyStats['conversions'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Attendance:</span>
                                <span class="font-semibold">{{ $monthlyStats['attendance'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">This Year</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">First Timers:</span>
                                <span class="font-semibold">{{ $yearlyStats['first_timers'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Conversions:</span>
                                <span class="font-semibold text-green-600">{{ $yearlyStats['conversions'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Attendance:</span>
                                <span class="font-semibold">{{ $yearlyStats['attendance'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="{{ route('dashboard.cells') }}" class="bg-blue-100 text-blue-800 px-4 py-2 rounded hover:bg-blue-200 font-semibold">View by Cell</a>
                <a href="{{ route('dashboard.folds') }}" class="bg-green-100 text-green-800 px-4 py-2 rounded hover:bg-green-200 font-semibold">View by Fold</a>
                <a href="{{ route('dashboard.members') }}" class="bg-purple-100 text-purple-800 px-4 py-2 rounded hover:bg-purple-200 font-semibold">View by Member</a>
                <a href="{{ route('dashboard.analytics') }}" class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded hover:bg-indigo-200 font-semibold">Detailed Analytics</a>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Actions -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ route('services.index') }}" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                                    <svg class="h-5 w-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                    <span class="text-gray-700">Take Attendance</span>
                                </a>
                                <a href="{{ route('first_timers.create') }}" class="flex items-center p-3 bg-pink-50 rounded-lg hover:bg-pink-100 transition-colors">
                                    <svg class="h-5 w-5 text-pink-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="text-gray-700">Register First Timer</span>
                                </a>
                                <a href="{{ route('members.create') }}" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                                    <svg class="h-5 w-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="text-gray-700">Add New Member</span>
                                </a>
                                <a href="{{ route('members.index') }}" class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                                    <svg class="h-5 w-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span class="text-gray-700">Manage Members</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Performers -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Top Inviters</h3>
                            <div class="space-y-3">
                                @forelse($topInviters as $inviter)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $inviter->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $inviter->invitees_count }} conversions</div>
                                        </div>
                                        <div class="text-xs text-green-600 font-semibold">
                                            {{ $inviter->invitees_count > 0 ? round(($inviter->invitees_count / $newMembersAnalytics['total_new']) * 100, 1) : 0 }}%
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-sm text-gray-500">No inviters found</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Cells -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Top Performing Cells</h3>
                            <div class="space-y-3">
                                @forelse($topCells as $cell)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $cell->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $cell->members_count }} members</div>
                                        </div>
                                        <div class="text-xs text-blue-600 font-semibold">
                                            {{ $cell->folds_count }} folds
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-sm text-gray-500">No cells found</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Services -->
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Upcoming Services</h3>
                        <div class="space-y-3">
                            @php
                                $upcomingServices = app('App\Services\ServiceGeneratorService')->getUpcomingServices();
                                $todayServices = app('App\Services\ServiceGeneratorService')->getTodayServices();
                                $nextServices = array_slice(array_merge($todayServices, $upcomingServices), 0, 5);
                            @endphp
                            
                            @forelse($nextServices as $service)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 rounded-full {{ $service['service_date'] === \Carbon\Carbon::now()->format('Y-m-d') ? 'bg-green-500' : 'bg-blue-500' }} mr-3"></div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $service['name'] }}</div>
                                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($service['service_date'])->format('M j, Y') }}</div>
                                        </div>
                                    </div>
                                    @if(isset($service['id']))
                                        <a href="{{ route('attendance.index', $service['id']) }}" class="text-xs text-blue-600 hover:text-blue-800">
                                            Take Attendance
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400 cursor-not-allowed">Take Attendance</span>
                                    @endif
                                </div>
                            @empty
                                <div class="text-sm text-gray-500">No upcoming services</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
