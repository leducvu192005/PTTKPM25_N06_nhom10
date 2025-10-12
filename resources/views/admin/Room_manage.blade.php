@extends('layouts.admin')

@section('title', 'Quản lý phòng trọ')

@section('content')
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
                        <th>Trạng thái</th>
                        <th>Người thuê</th>
                        <th>Ngày đăng</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                @php
    // Tạo dữ liệu giả lập (hard code)
    $rooms = [
        [
            'name' => 'P101 - Quận 1',
            'owner' => 'Nguyễn Văn Nam',
            'price' => '₫5,000,000',
            'status' => 'Đang cho thuê',
            'tenant' => 'Trần Văn A',
            'date' => '05/03/2024',
            'status_class' => 'bg-success'
        ],
        [
            'name' => 'P205 - Quận 3',
            'owner' => 'Phạm Thị Bích',
            'price' => '₫4,800,000',
            'status' => 'Trống',
            'tenant' => '-',
            'date' => '10/04/2024',
            'status_class' => 'bg-secondary'
        ],
        [
            'name' => 'P308 - Quận 7',
            'owner' => 'Lê Minh Tuấn',
            'price' => '₫6,200,000',
            'status' => 'Đang cho thuê',
            'tenant' => 'Ngô Thanh Tùng',
            'date' => '20/06/2024',
            'status_class' => 'bg-success'
        ],
        [
            'name' => 'P412 - Quận 5',
            'owner' => 'Vũ Hoàng Long',
            'price' => '₫3,900,000',
            'status' => 'Đang bảo trì',
            'tenant' => '-',
            'date' => '25/07/2024',
            'status_class' => 'bg-warning text-dark'
        ],
    ];
@endphp

                <tbody>
    @foreach ($rooms as $room)
        <tr>
            <td><strong>{{ $room['name'] }}</strong></td>
            <td>{{ $room['owner'] }}</td>
            <td>{{ $room['price'] }}</td>
            <td><span class="badge {{ $room['status_class'] }}">{{ $room['status'] }}</span></td>
            <td>{{ $room['tenant'] }}</td>
            <td>{{ $room['date'] }}</td>
            <td class="text-center">
                <button class="btn btn-outline-primary btn-sm">Sửa</button>
                <button class="btn btn-outline-danger btn-sm">Xóa</button>
            </td>
        </tr>
    @endforeach
</tbody>

            </table>
        </div>
    </div>
</div>
@endsection
