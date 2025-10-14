@extends('layouts.admin')

@section('title', 'Quản lý phòng trọ')

@section('content')

@php
    // ✅ Cách A: nếu backend chưa truyền $rooms thì tạo collection rỗng để tránh lỗi
    $rooms = $rooms ?? collect();
@endphp

<div class="container-fluid px-4 py-4">
    <h2 class="fw-bold mb-3">Quản lý phòng trọ</h2>
    <p class="text-muted mb-4">Quản lý danh sách phòng đang cho thuê và trạng thái hoạt động.</p>

    {{-- Thanh công cụ --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="Tìm kiếm theo tên phòng, khu vực...">
            <button class="btn btn-dark">Tìm kiếm</button>
        </div>
        <a href="#" class="btn btn-success">
            + Thêm phòng mới
        </a>
    </div>

    {{-- Bảng danh sách phòng --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tên phòng</th>
                        <th>Chủ nhà</th>
                        <th>Giá thuê</th>
                        <th>Người thuê</th>
                        <th>Ngày đăng</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $room)
                        <tr>
                            <td><strong>{{ $room->name }}</strong></td>
                            <td>{{ $room->owner }}</td>
                            <td>₫{{ number_format($room->price, 0, ',', '.') }}</td>
                            <td>{{ $room->tenant ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($room->posted_date)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-outline-primary btn-sm">Sửa</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Chưa có phòng nào trong hệ thống.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
