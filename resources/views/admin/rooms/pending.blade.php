@extends('layouts.admin')

@section('title', 'Phòng chờ duyệt')
@section('page-title', 'Danh sách phòng đang chờ duyệt')

@section('content')
<div class="card">
    <div class="card-body">
        <h5>Danh sách phòng chờ duyệt</h5>
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tên phòng</th>
                    <th>Người đăng</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->user->name ?? 'Không rõ' }}</td>
                        <td>{{ $room->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('admin.approve', $room->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                            </form>
                            <form action="{{ route('admin.reject', $room->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
