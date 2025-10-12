@extends('layouts.admin')

@section('title', 'Đặt phòng')
@section('page-title', 'Quản lý đặt phòng')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Danh sách yêu cầu đặt phòng</h5>
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Mã ĐP</th>
                        <th>Khách hàng</th>
                        <th>Phòng</th>
                        <th>Giá thuê</th>
                        <th>Đặt cọc</th>
                        <th>Ngày vào</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>BK001</td>
                        <td>
                            Nguyễn Văn A<br>
                            <small>0912 345 678</small>
                        </td>
                        <td>P101 - Quận 1</td>
                        <td>đ5,000,000</td>
                        <td>đ5,000,000</td>
                        <td>15/11/2025</td>
                        <td><span class="badge bg-warning text-dark">Chờ duyệt</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-dark">✔ Duyệt</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">✘ Từ chối</a>
                        </td>
                    </tr>
                    <tr>
                        <td>BK002</td>
                        <td>
                            Trần Thị B<br>
                            <small>0923 456 789</small>
                        </td>
                        <td>P205 - Quận 3</td>
                        <td>đ4,500,000</td>
                        <td>đ4,500,000</td>
                        <td>01/12/2025</td>
                        <td><span class="badge bg-success">Đã xác nhận</span></td>
                        <td><span class="text-muted">Đã xử lý</span></td>
                    </tr>
                    <tr>
                        <td>BK003</td>
                        <td>
                            Lê Văn C<br>
                            <small>0987 654 321</small>
                        </td>
                        <td>P303 - Quận 5</td>
                        <td>đ6,000,000</td>
                        <td>đ3,000,000</td>
                        <td>20/11/2025</td>
                        <td><span class="badge bg-danger">Đã hủy</span></td>
                        <td><span class="text-muted">Đã xử lý</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
