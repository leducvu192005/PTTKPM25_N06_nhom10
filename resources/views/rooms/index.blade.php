@extends('layouts.app')
@section('title', 'Danh sách phòng trọ')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold text-primary">
        <i class="bi bi-house-door-fill"></i> Danh sách phòng trọ
    </h2>

    <div class="row">
        {{-- CỘT TRÁI: DANH SÁCH PHÒNG --}}
        <div class="col-lg-8 col-md-7">
            @forelse($rooms as $room)
                <div class="card mb-4 shadow-sm border-0 rounded-4 overflow-hidden hover-shadow">
                    <div class="row g-0">
                        {{-- Ảnh --}}
                        <div class="col-md-4">
                            @if($room->images && count($room->images) > 0)
                                <img src="{{ asset('storage/' . $room->images[0]->image_path) }}" 
                                     class="img-fluid h-100 object-fit-cover" alt="{{ $room->title }}">
                            @else
                                <img src="https://picsum.photos/400/250?random={{ $loop->index }}" 
                                     class="img-fluid h-100 object-fit-cover" alt="{{ $room->title }}">
                            @endif
                        </div>

                        {{-- Thông tin phòng --}}
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $room->title }}</h5>
                                <p class="card-text mb-1">
                                    <strong>Giá:</strong> 
                                    <span class="text-danger">{{ number_format($room->price) }} VNĐ/tháng</span>
                                </p>
                                <p class="card-text text-muted mb-2">
                                    <i class="bi bi-geo-alt"></i> {{ $room->address }}
                                </p>
                                <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye-fill"></i> Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="bi bi-house-x fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Không có phòng nào phù hợp với yêu cầu của bạn.</p>
                </div>
            @endforelse

            {{-- Phân trang --}}
            <div class="mt-4">
                {{ $rooms->links('pagination::bootstrap-5') }}
            </div>
        </div>

        {{-- CỘT PHẢI: BỘ LỌC --}}
        <div class="col-lg-4 col-md-5">
            <div class="card shadow-sm border-0 rounded-4 p-3 sticky-top" style="top: 80px;">
                <h5 class="fw-bold mb-3 text-center text-secondary">
                    <i class="bi bi-funnel-fill"></i> Bộ lọc tìm kiếm
                </h5>

                <form method="GET" action="{{ route('rooms.index') }}">
                    {{-- Địa điểm --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="bi bi-geo-alt-fill text-danger"></i> Địa điểm</label>
                        <input type="text" name="address" class="form-control" 
                               placeholder="Nhập địa điểm..." value="{{ request('address') }}">
                    </div>

                    {{-- Lọc theo giá --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="bi bi-cash-stack text-success"></i> Mức giá</label>
                        <select name="price_filter" class="form-select">
                            <option value="">-- Tất cả --</option>
                            <option value="1" {{ request('price_filter')=='1'?'selected':'' }}>Dưới 2 triệu</option>
                            <option value="2" {{ request('price_filter')=='2'?'selected':'' }}>2 - 4 triệu</option>
                            <option value="3" {{ request('price_filter')=='3'?'selected':'' }}>Trên 4 triệu</option>
                        </select>
                    </div>

                    {{-- Nút hành động --}}
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">
                            <i class="bi bi-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('rooms.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Làm mới
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- CSS tuỳ chỉnh --}}
<style>
    .hover-shadow:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endsection
