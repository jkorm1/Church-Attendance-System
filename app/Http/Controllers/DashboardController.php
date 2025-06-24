<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Attendance;
use App\Services\ServiceGeneratorService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $serviceGenerator;

    public function __construct(ServiceGeneratorService $serviceGenerator)
    {
        $this->serviceGenerator = $serviceGenerator;
    }

    public function index()
    {
        $user = Auth::user();

        // Get manageable members query
        $membersQuery = $user->getManageableMembers();

        // Stats
        $totalMembers = $membersQuery->count();
        $activeMembers = (clone $membersQuery)->where('status', 'active')->count();
        
        // Use clone to avoid affecting the original query
        $memberIds = (clone $membersQuery)->pluck('id');

        // Attendance stats
        $totalAttendance = Attendance::whereIn('member_id', $memberIds)->count();

        // Recent Activity
        $recentAttendance = Attendance::with('member')
            ->whereIn('member_id', $memberIds)
            ->latest()
            ->take(5)
            ->get();

        // Services (remains global as services are not tied to cells/folds)
        $allServices = $this->serviceGenerator->getAllServices();
        $upcomingServices = $this->serviceGenerator->getUpcomingServices();
        $todayServices = $this->serviceGenerator->getTodayServices();
        $nextServices = array_slice(array_merge($todayServices, $upcomingServices), 0, 5);

        return view('dashboard', [
            'totalMembers' => $totalMembers,
            'activeMembers' => $activeMembers,
            'totalAttendance' => $totalAttendance,
            'upcomingServiceCount' => count($allServices),
            'nextServices' => $nextServices,
            'recentAttendance' => $recentAttendance,
        ]);
    }
}
