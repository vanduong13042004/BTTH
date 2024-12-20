<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    // Định nghĩa bảng mà mô hình này sẽ tương ứng
    protected $table = 'issues';

    // Các cột có thể gán mass-assignment
    protected $fillable = [
        'computer_id',
        'reported_by',
        'reported_date',  // Thêm reported_date vào fillable
        'description',
        'urgency',
        'status',
        'created_at',
        'updated_at',
    ];

    // Quan hệ với bảng 'computers' (mỗi vấn đề sẽ thuộc về một máy tính)
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
