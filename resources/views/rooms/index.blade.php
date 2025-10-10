@extends('layouts.app')
@section('title', 'Danh sách phòng trọ')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold text-primary">
        <i class="bi bi-house-door-fill"></i> Danh sách phòng trọ
    </h2>

    {{-- Form tìm kiếm và lọc --}}
    <form method="GET" action="{{ route('rooms.index') }}" class="card shadow-sm border-0 mb-5 p-3">
        <div class="row g-3 align-items-center">
            {{-- Ô nhập địa điểm --}}
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-geo-alt-fill text-danger"></i></span>
                    <input type="text" name="address" class="form-control border-start-0" 
                           placeholder="Nhập địa điểm cần tìm..." value="{{ request('address') }}">
                </div>
            </div>

            {{-- Chọn mức giá --}}
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-cash-stack text-success"></i></span>
                    <select name="price_filter" class="form-select border-start-0">
                        <option value="">-- Lọc theo giá --</option>
                        <option value="1" {{ request('price_filter')=='1' ? 'selected' : '' }}>Dưới 2 triệu</option>
                        <option value="2" {{ request('price_filter')=='2' ? 'selected' : '' }}>2 - 4 triệu</option>
                        <option value="3" {{ request('price_filter')=='3' ? 'selected' : '' }}>Trên 4 triệu</option>
                    </select>
                </div>
            </div>

            {{-- Nút hành động --}}
            <div class="col-md-3 d-flex">
                <button class="btn btn-primary w-100 me-2">
                    <i class="bi bi-search"></i> Tìm kiếm
                </button>
                <a href="{{ route('rooms.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </div>
    </form>

    {{-- Danh sách phòng --}}
    <div class="row">
        @forelse($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-shadow">
                    {{-- Ảnh phòng --}}
                    @if($room->images && count($room->images) > 0)
                        <img src="{{ asset('images/' . $room->images[0]) }}" class="card-img-top" alt="{{ $room->title }}">
                    @else
                        <img src="https://picsum.photos/400/250?random={{ $loop->index }}" class="card-img-top" alt="{{ $room->title }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $room->title }}</h5>
                        <p class="card-text mb-1">
                            <strong>Giá:</strong> <span class="text-danger">{{ number_format($room->price) }} VNĐ/tháng</span>
                        </p>
                        <p class="card-text text-muted mb-3">
                            <i class="bi bi-geo-alt"></i> {{ $room->address }}
                        </p>
                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-eye-fill"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="bi bi-house-x fs-1 text-muted"></i>
                <p class="mt-3 text-muted">Không có phòng nào phù hợp với yêu cầu của bạn.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
