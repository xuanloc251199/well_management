<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water_Quality extends Model
{
    use HasFactory;

    /**
     * Tên bảng trong cơ sở dữ liệu.
     *
     * @var string
     */
    protected $table = 'water_quality';

    /**
     * Các thuộc tính có thể được gán giá trị hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'well_id',
        'ph_level',
        'tds',
        'contamination',
        'measured_at',
    ];

    /**
     * Định nghĩa các thuộc tính kiểu dữ liệu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'ph_level' => 'float',
        'tds' => 'float',
        'measured_at' => 'datetime',
    ];

    /**
     * Tắt các thuộc tính mặc định của Laravel như 'created_at' và 'updated_at'.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Định nghĩa quan hệ với model Wells.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function well()
    {
        return $this->belongsTo(Wells::class, 'well_id');
    }
}
