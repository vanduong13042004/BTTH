<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    // Định nghĩa bảng mà mô hình này sẽ tương ứng
    protected $table = 'computers';

    // Các cột có thể gán mass-assignment
    protected $fillable = [
        'computer_name',
        'model',
        'operating_system',
        'processor',
        'memory',
        'available',
    ];

    // Quan hệ với bảng 'issues' (một máy tính có thể có nhiều vấn đề)
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
