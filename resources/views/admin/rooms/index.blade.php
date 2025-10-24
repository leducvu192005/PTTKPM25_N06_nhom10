@extends('layouts.admin')

@section('title', 'Quản lý Phòng trọ')

@section('content')
    <h1 class="mb-4">🏠 Quản lý Phòng trọ</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @elseif (session('danger'))
        <div class="alert alert-danger">{{ session('danger') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Chủ phòng</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->user->name ?? 'N/A' }}</td>
                    <td>{{ $room->title }}</td>
                    <td>
                        @if($room->status == 'approved')
                            <span class="badge bg-success">Đã duyệt</span>
                        @elseif($room->status == 'rejected')
                            <span class="badge bg-danger">Từ chối</span>
                        @else
                            <span class="badge bg-secondary">Chờ duyệt</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.rooms.show', $room->id) }}" class="btn btn-sm btn-info">Xem</a>

                        @if($room->status != 'approved')
                            <form action="{{ route('admin.rooms.approve', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-success">Duyệt</button>
                            </form>
                        @endif

                        @if($room->status != 'rejected')
                            <form action="{{ route('admin.rooms.reject', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-warning">Từ chối</button>
                            </form>
                        @endif

                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa phòng này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
