@extends('layouts.app')

@section('content')
    <h1>Tạo mới vấn đề</h1>

    <form action="{{ route('issues.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="computer_id">Máy tính</label>
            <select name="computer_id" id="computer_id" class="form-control">
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reported_by">Người báo cáo</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả vấn đề</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="urgency">Mức độ</label>
            <select name="urgency" id="urgency" class="form-control">
                <option value="Low">Thấp</option>
                <option value="Medium">Trung bình</option>
                <option value="High">Cao</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="Open">Mở</option>
                <option value="In Progress">Đang xử lý</option>
                <option value="Resolved">Đã giải quyết</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection
