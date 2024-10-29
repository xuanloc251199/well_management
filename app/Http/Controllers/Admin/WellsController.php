<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Water_Quality;
use App\Models\Water_Usage;
use App\Models\Wells;
use Illuminate\Http\Request;

class WellsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý nước ngầm";
        $details = "";
        $wells = Wells::all();
        return view('admin.pages.wells.index', compact('title', 'details', 'wells'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới nguồn nước ngầm";
        $details = "";
        return view('admin.pages.wells.create', compact('title', 'details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'depth' => 'required|string',
            'water_level' => 'required|string',
            'status' => 'required|string|max:100',
        ]);

        $well = Wells::create([
            'name' => $request->name,
            'location' => $request->location,
            'depth' => $request->depth,
            'water_level' => $request->water_level,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        // if ($well) {
        //     Water_Quality::create([
        //         'well_id' => $well->id,
        //         'ph_level' => $request->ph_level,
        //         'tds' => $request->tds,
        //         'contamination' => $request->contamination,
        //         'measured_at' => $request->measured_at,
        //     ]);

        //     Water_Usage::create([
        //         'well_id' => $well->id,
        //         'volume_used' => $request->volume_used,
        //         'usage_date' => $request->usage_date,
        //     ]);
        // }

        return redirect()->route('admin.wells.index')->with('success', 'Well and related data stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Chi tiết nước ngầm";
        $details = "";
        $well = Wells::where('wells.id', $id)
            ->leftJoin('water_quality', 'wells.id', '=', 'water_quality.well_id')
            ->leftJoin('water_usage', 'wells.id', '=', 'water_usage.well_id')
            ->select(
                'wells.*',
                'water_quality.ph_level',
                'water_quality.tds',
                'water_quality.contamination',
                'water_quality.measured_at',
                'water_usage.volume_used',
                'water_usage.usage_date'
            )
            ->first();
        return view('admin.pages.wells.show', compact('title', 'details', 'well'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa nguồn nước ngầm";
        $details = "";
        $well = Wells::where('wells.id', $id)
            ->leftJoin('water_quality', 'wells.id', '=', 'water_quality.well_id')
            ->leftJoin('water_usage', 'wells.id', '=', 'water_usage.well_id')
            ->select(
                'wells.*',
                'water_quality.ph_level',
                'water_quality.tds',
                'water_quality.contamination',
                'water_quality.measured_at',
                'water_usage.volume_used',
                'water_usage.usage_date'
            )
            ->first();
        return view('admin.pages.wells.update', compact('title', 'details', 'well'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'depth' => 'required|string',
            'water_level' => 'required|string',
            'status' => 'required|string|max:100',
        ]);


        $well = Wells::findOrFail($id);

        $well->update([
            'name' => $request->name,
            'location' => $request->location,
            'depth' => $request->depth,
            'water_level' => $request->water_level,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        return redirect()->route('admin.wells.index')->with('success', 'Well and related data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $well = Wells::findOrFail($id);
        Water_Quality::where('well_id', $well->id)->delete();
        Water_Usage::where('well_id', $well->id)->delete();
        $well->delete();
        return redirect()->route('admin.wells.index')->with('success', 'User deleted successfully.');
    }
}
