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
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
