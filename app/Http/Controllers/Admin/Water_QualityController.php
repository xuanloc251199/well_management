<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Water_Quality;
use App\Models\Wells;
use Illuminate\Http\Request;

class Water_QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý chất lượng nước";
        $details = "";
        $items = Water_Quality::join('wells', 'water_quality.well_id', '=', 'wells.id')
            ->select('water_quality.*', 'wells.name')
            ->get();
        return view('admin.pages.water_quality.index', compact('title', 'details', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm chất lượng nước";
        $details = "";
        $wells = Wells::leftJoin('water_quality', 'wells.id', '=', 'water_quality.well_id')
            ->whereNull('water_quality.well_id')
            ->select('wells.*')
            ->get();
        return view('admin.pages.water_quality.create', compact('title', 'details', 'wells'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'well_id' => 'required',
            'ph_level' => 'required|string',
            'tds' => 'required|string',
            'contamination' => 'required|nullable|string|max:255',
            'measured_at' => 'required|date',
        ], [
            'well_id.required' => 'Vui lòng chọn một giếng nước.',
            'ph_level.required' => 'Vui lòng nhập mức độ pH.',
            'ph_level.string' => 'Mức độ pH phải là chuỗi ký tự.',
            'tds.required' => 'Vui lòng nhập giá trị TDS.',
            'tds.string' => 'Giá trị TDS phải là chuỗi ký tự.',
            'contamination.string' => 'Thông tin ô nhiễm phải là chuỗi ký tự.',
            'contamination.required' => 'Vui lòng nhập thông tin ô nhiễm.',
            'contamination.max' => 'Thông tin ô nhiễm không được vượt quá 255 ký tự.',
            'measured_at.required' => 'Vui lòng chọn ngày đo.',
            'measured_at.date' => 'Ngày đo không hợp lệ.',
        ]);

        Water_Quality::create([
            'well_id' => $request->well_id,
            'ph_level' => $request->ph_level,
            'tds' => $request->tds,
            'contamination' => $request->contamination,
            'measured_at' => $request->measured_at,
        ]);

        return redirect()->route('admin.water_quality.index')->with('success', 'Well and related data stored successfully.');
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
        $title = "Sửa chất lượng nước";
        $details = "";
        $wells = Wells::leftJoin('water_quality', 'wells.id', '=', 'water_quality.well_id')
            ->whereNull('water_quality.well_id')
            ->select('wells.*')
            ->get();
        $item = Water_Quality::find($id);

        if ($item) {
            $well = Wells::find($item->well_id);
        } else {
            $well = null;
        }
        return view('admin.pages.water_quality.update', compact('title', 'details', 'item', 'wells', 'well'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'measured_at' => 'required|date',
            'ph_level' => 'required|string',
            'tds' => 'required|string',
            'contamination' => 'nullable|string|max:255',
            'well_id' => 'required|exists:wells,id',
        ], [
            'measured_at.required' => 'Vui lòng chọn ngày đo.',
            'measured_at.date' => 'Ngày đo không hợp lệ.',
            'ph_level.required' => 'Vui lòng nhập mức độ pH.',
            'ph_level.string' => 'Mức độ pH phải là chuỗi ký tự.',
            'tds.required' => 'Vui lòng nhập giá trị TDS.',
            'tds.string' => 'Giá trị TDS phải là chuỗi ký tự.',
            'contamination.string' => 'Thông tin ô nhiễm phải là chuỗi ký tự.',
            'contamination.max' => 'Thông tin ô nhiễm không được vượt quá 255 ký tự.',
            'well_id.required' => 'Vui lòng chọn một giếng nước.',
            'well_id.exists' => 'Giếng nước không tồn tại.',
        ]);
    
        $waterQuality = Water_Quality::findOrFail($id);
    
        $waterQuality->update([
            'ph_level' => $request->ph_level,
            'tds' => $request->tds,
            'contamination' => $request->contamination,
            'measured_at' => $request->measured_at,
            'well_id' => $request->well_id,
        ]);
    
        return redirect()->route('admin.water_quality.index')->with('success', 'Well and related data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Water_Quality::findOrFail($id)->delete();
        return redirect()->route('admin.water_quality.index')->with('success', 'User deleted successfully.');
    }
}
