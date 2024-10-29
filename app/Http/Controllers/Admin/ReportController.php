<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wells;
use App\Models\Water_Quality;
use App\Models\Water_Usage;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = DB::table('wells')
        ->join('water_quality', 'wells.id', '=', 'water_quality.well_id')
        ->join('water_usage', 'wells.id', '=', 'water_usage.well_id')
        ->select(DB::raw('MONTH(created_at) as month'), 
                 DB::raw('AVG(water_level) as water_level'), 
                 DB::raw('AVG(ph_level) as water_quality'), 
                 DB::raw('SUM(volume_used) as water_usage'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy('month')
        ->get();
        $title = "Báo cáo";
        $details = "";
        return view('admin.pages.reports.index', compact('title', 'details', 'reports'));
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
