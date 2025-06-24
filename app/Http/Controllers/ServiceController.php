<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Services\ServiceGeneratorService;

class ServiceController extends Controller
{
    protected $serviceGenerator;

    public function __construct(ServiceGeneratorService $serviceGenerator)
    {
        $this->serviceGenerator = $serviceGenerator;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get manually created services
        $manualServices = Service::orderBy('service_date', 'desc')->get();
        
        // Get auto-generated services (today + upcoming)
        $autoServices = collect($this->serviceGenerator->getAllServices());
        
        // Combine and sort by date (most recent first)
        $allServices = $manualServices->concat($autoServices)->sortByDesc('service_date');
        
        return view('attendance.services', compact('allServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
