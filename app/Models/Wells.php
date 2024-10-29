<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Wells extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * Tên bảng trong cơ sở dữ liệu.
     *
     * @var string
     */
    protected $table = 'wells';

    /**
     * Các thuộc tính có thể được gán giá trị hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'depth',
        'water_level',
        'status',
        'created_at',
    ];

    /**
     * Định nghĩa các thuộc tính kiểu dữ liệu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'depth' => 'float',
        'water_level' => 'float',
        'created_at' => 'datetime',
    ];

    /**
     * Tắt các thuộc tính mặc định của Laravel như 'updated_at'.
     *
     * @var bool
     */
    public $timestamps = false;
}
