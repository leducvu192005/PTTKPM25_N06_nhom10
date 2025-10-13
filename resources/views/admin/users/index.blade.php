@extends('layouts.admin')

@section('title', 'Trang người thuê')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Thông tin phòng thuê của bạn</h2>

    {{-- Thông tin người thuê --}}
    <div class="card mb-4 shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Thông tin cá nhân</h5>
            <div>
                <button class="btn btn-warning btn-sm me-2" onclick="alert('Chức năng sửa đang được phát triển!')">
                    <i class="bi bi-pencil-square"></i> Sửa
                </button>
                <button class="btn btn-danger btn-sm" onclick="if(confirm('Bạn có chắc muốn xóa người thuê này không?')) alert('Đã xóa thành công!')">
                    <i class="bi bi-trash"></i> Xóa
                </button>
            </div>
        </div>

        <p class="mt-3"><strong>Họ tên:</strong> Nguyễn Văn A</p>
        <p><strong>Email:</strong> nguyenvana@email.com</p>
        <p><strong>Số điện thoại:</strong> 0912 345 678</p>
    </div>

    {{-- Thông tin thuê phòng --}}
    <div class="card shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Chi tiết phòng thuê</h5>
            <div>
                <button class="btn btn-warning btn-sm me-2" onclick="alert('Sửa thông tin phòng thuê!')">
                    <i class="bi bi-pencil-square"></i> Sửa
                </button>
                <button class="btn btn-danger btn-sm" onclick="if(confirm('Bạn có chắc muốn xóa thông tin phòng thuê này không?')) alert('Đã xóa thành công!')">
                    <i class="bi bi-trash"></i> Xóa
                </button>
            </div>
        </div>

        <table class="table table-striped mt-3 align-middle">
            <thead>
                <tr>
                    <th>Phòng</th>
                    <th>Khu vực</th>
                    <th>Giá thuê</th>
                    <th>Trạng thái thanh toán</th>
                    <th>Ngày vào</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>P101</td>
                    <td>Quận 1</td>
                    <td>₫5,000,000</td>
                    <td><span class="badge bg-success">Đã thanh toán</span></td>
                    <td>01/01/2024</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Thông báo --}}
    <div class="mt-4 card p-3 shadow-sm">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Thông báo từ chủ nhà</h5>
            <div>
            </div>
        </div>

        <div class="alert alert-info mt-3">
            Vui lòng chuẩn bị thanh toán tiền thuê phòng cho tháng tới trước ngày 25 nhé!
        </div>
    </div>
</div>
@endsection
