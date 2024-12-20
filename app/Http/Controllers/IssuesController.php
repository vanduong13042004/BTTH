<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    // Hiển thị danh sách các vấn đề
    public function index()
    {
        $issues = Issue::paginate(10); // Phân trang 10 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form tạo mới vấn đề
    public function create()
    {
        $computers = Computer::all(); // Lấy tất cả máy tính
        return view('issues.create', compact('computers'));
    }

    // Lưu thông tin vấn đề mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:255',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được tạo thành công!');
    }

    // Hiển thị chi tiết vấn đề
    public function show(string $id)
    {
        $issue = Issue::findOrFail($id);
        return view('issues.show', compact('issue'));
    }

    // Hiển thị form chỉnh sửa vấn đề
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all(); // Lấy tất cả máy tính
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:255',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công!');
    }

    // Xóa một vấn đề
    public function destroy(string $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}
