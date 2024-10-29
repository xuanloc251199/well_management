<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Water_Usage;
use App\Models\Wells;
use Illuminate\Http\Request;

class Water_UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý sử dụng nước";
        $details = "";
        $items = Water_Usage::join('wells', 'water_usage.well_id', '=', 'wells.id')
            ->select('water_usage.*', 'wells.name')
            ->get();
        return view('admin.pages.water_usage.index', compact('title', 'details', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm - sử dụng nước";
        $details = "";
        $wells = Wells::leftJoin('water_usage', 'wells.id', '=', 'water_usage.well_id')
            ->whereNull('water_usage.well_id')
            ->select('wells.*')
            ->get();
        return view('admin.pages.water_usage.create', compact('title', 'details', 'wells'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'volume_used' => 'required|string',
            'usage_date' => 'required|date',
            'well_id' => 'required',
        ], [
            'volume_used.required' => 'Vui lòng nhập khối lượng nước sử dụng.',
            'volume_used.string' => 'Khối lượng nước sử dụng phải là chuỗi ký tự.',
            'usage_date.required' => 'Vui lòng nhập ngày sử dụng.',
            'usage_date.date' => 'Ngày sử dụng không hợp lệ.',
            'well_id.required' => 'Vui lòng chọn một giếng nước.',
        ]);

        Water_Usage::create([
            'well_id' => $request->well_id,
            'volume_used' => $request->volume_used,
            'usage_date' => $request->usage_date,
        ]);

        return redirect()->route('admin.water_usage.index')->with('success', 'Well and related data stored successfully.');
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
        $wells = Wells::leftJoin('water_usage', 'wells.id', '=', 'water_usage.well_id')
            ->whereNull('water_usage.well_id')
            ->select('wells.*')
            ->get();
        $item = Water_Usage::find($id);
        if ($item) {
            $well = Wells::find($item->well_id);
        } else {
            $well = null;
        }
        return view('admin.pages.water_usage.update', compact('title', 'details', 'item', 'wells', 'well'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'volume_used' => 'required|string',
            'usage_date' => 'required|date',
            'well_id' => 'required',
        ], [
            'volume_used.required' => 'Vui lòng nhập khối lượng nước sử dụng.',
            'volume_used.string' => 'Khối lượng nước sử dụng phải là chuỗi ký tự.',
            'usage_date.required' => 'Vui lòng nhập ngày sử dụng.',
            'usage_date.date' => 'Ngày sử dụng không hợp lệ.',
            'well_id.required' => 'Vui lòng chọn một giếng nước.',
        ]);

        $waterUsage = Water_Usage::findOrFail($id);

        $waterUsage->update([
            'well_id' => $request->well_id,
            'volume_used' => $request->volume_used,
            'usage_date' => $request->usage_date,
        ]);

        return redirect()->route('admin.water_usage.index')->with('success', 'Well and related data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Water_Usage::findOrFail($id)->delete();
        return redirect()->route('admin.water_usage.index')->with('success', 'User deleted successfully.');
    }
}


?>