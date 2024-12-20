@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa vấn đề</h1>

    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="computer_id">Máy tính</label>
            <select name="computer_id" id="computer_id" class="form-control">
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" @if($issue->computer_id == $computer->id) selected @endif>
                        {{ $computer->computer_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reported_by">Người báo cáo</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả vấn đề</label>
            <textarea name="description" id="description" class="form-control" required>{{ $issue->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="urgency">Mức độ</label>
            <select name="urgency" id="urgency" class="form-control">
                <option value="Low" @if($issue->urgency == 'Low') selected @endif>Thấp</option>
                <option value="Medium" @if($issue->urgency == 'Medium') selected @endif>Trung bình</option>
                <option value="High" @if($issue->urgency == 'High') selected @endif>Cao</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="Open" @if($issue->status == 'Open') selected @endif>Mở</option>
                <option value="In Progress" @if($issue->status == 'In Progress') selected @endif>Đang xử lý</option>
                <option value="Resolved" @if($issue->status == 'Resolved') selected @endif>Đã giải quyết</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
