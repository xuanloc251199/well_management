<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water_Usage extends Model
{
    use HasFactory;

    /**
     * Tên bảng trong cơ sở dữ liệu.
     *
     * @var string
     */
    protected $table = 'water_usage';

    /**
     * Các thuộc tính có thể được gán giá trị hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'well_id',
        'volume_used',
        'usage_date',
    ];

    /**
     * Định nghĩa các thuộc tính kiểu dữ liệu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'volume_used' => 'float',
        'usage_date' => 'datetime',
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
