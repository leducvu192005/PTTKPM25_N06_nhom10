@extends('layouts.admin')

@section('title', 'Đặt phòng')
@section('page-title', 'Quản lý đặt phòng')

@section('content')

    {{-- 🟡 Thêm đoạn này để tránh lỗi khi backend chưa có biến $bookings --}}
    @php $bookings = $bookings ?? collect(); @endphp

    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Danh sách yêu cầu đặt phòng</h5>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

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
                   @forelse($bookings as $booking) 
                        <tr>
                            <td>{{ $booking->code }}</td>
                            <td>
                                {{ $booking->customer_name }}<br>
                                <small>{{ $booking->customer_phone }}</small>
                            </td>
                            <td>
                                {{ $booking->room->name ?? 'Không rõ' }} 
                                - {{ $booking->room->location ?? '' }}
                            </td>
                            <td>đ{{ number_format($booking->price) }}</td>
                            <td>đ{{ number_format($booking->deposit) }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->checkin_date)->format('d/m/Y') }}</td>
                            <td>
                                @if($booking->status == 'pending')
                                    <span class="badge bg-warning text-dark">Chờ duyệt</span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="badge bg-success">Đã xác nhận</span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="badge bg-danger">Đã hủy</span>
                                @endif
                            </td>
                            <td>
                                @if($booking->status == 'pending')
                                    <a href="{{ route('admin.bookings.approve', $booking->id) }}" 
                                       class="btn btn-sm btn-dark">
                                       ✔ Duyệt
                                    </a>
                                    <a href="{{ route('admin.bookings.reject', $booking->id) }}" 
                                       class="btn btn-sm btn-outline-danger">
                                       ✘ Từ chối
                                    </a>
                                @else
                                    <span class="text-muted">Đã xử lý</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Chưa có yêu cầu đặt phòng nào.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
