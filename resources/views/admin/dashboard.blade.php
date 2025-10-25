@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Tổng số người dùng</h5>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Số phòng đã duyệt</h5>
                <h3 class="text-primary">{{ $totalRooms }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Người thuê</h5>
                <h3 class="text-success">{{ $totalUsers }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Tổng số phòng</h5>
                <h3 class="text-primary">{{ $totalRooms }}</h3>
                <h5 class="card-title">Phòng đã đặt</h5>
                <h3 class="text-warning">{{ $totalBookings }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Số phòng đã duyệt</h5>
                <h3 class="text-warning">{{ $approvedRooms }}</h3>
            </div>
        </div>
    </div>
                <h5 class="card-title">Doanh thu</h5>
                <h3 class="text-danger">{{ number_format($totalRevenue, 0, ',', '.') }}đ</h3>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Đặt phòng gần đây</h5>
                </div>
                <div class="card-body">
                    @if($bookings->count() > 0)
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Tên người thuê</th>
                                    <th>Phòng</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->user->name ?? 'Ẩn danh' }}</td>
                                        <td>{{ $booking->room->name ?? 'Không rõ' }}</td>
                                        <td>{{ $booking->created_at?->format('d/m/Y') ?? '-' }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($booking->status == 'Đã xác nhận') bg-success
                                                @elseif($booking->status == 'Đang chờ') bg-warning
                                                @else bg-secondary
                                                @endif">
                                                {{ $booking->status ?? 'Chờ xác nhận' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted mb-0">Chưa có đơn đặt phòng nào.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
