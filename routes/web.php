<?php

use App\Http\Controllers\IssuesController;
use Illuminate\Support\Facades\Route;

// Đường dẫn hiển thị danh sách các vấn đề
Route::get('/', [IssuesController::class, 'index'])->name('issues.index');

// Đường dẫn để tạo mới một vấn đề (hiển thị form thêm mới)
Route::get('/issues/create', [IssuesController::class, 'create'])->name('issues.create');

// Đường dẫn để lưu dữ liệu vấn đề mới (thực hiện thêm mới)
Route::post('/issues', [IssuesController::class, 'store'])->name('issues.store');

// Đường dẫn để hiển thị chi tiết một vấn đề cụ thể
Route::get('/issues/{id}', [IssuesController::class, 'show'])->name('issues.show');

// Đường dẫn để chỉnh sửa thông tin vấn đề (hiển thị form chỉnh sửa)
Route::get('/issues/{id}/edit', [IssuesController::class, 'edit'])->name('issues.edit');

// Đường dẫn để cập nhật thông tin vấn đề (thực hiện cập nhật)
Route::put('/issues/{id}', [IssuesController::class, 'update'])->name('issues.update');

// Đường dẫn để xóa vấn đề (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/issues/{id}', [IssuesController::class, 'destroy'])->name('issues.destroy');
