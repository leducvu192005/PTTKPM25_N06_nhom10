@extends('layouts.app')

@section('title', 'Danh sách phòng trọ')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Danh sách phòng trọ</h2>

  <form method="GET" action="{{ route('rooms.index') }}" class="row mb-4">
    <div class="col-md-4 mb-2">
        <input type="text" name="address" class="form-control" placeholder="Nhập địa điểm..." value="{{ request('address') }}">
    </div>
    <div class="col-md-3 mb-2">
        <select name="price_filter" class="form-select">
            <option value="">Lọc theo giá</option>
            <option value="1" {{ request('price_filter')=='1'?'selected':'' }}>Dưới 2 triệu</option>
            <option value="2" {{ request('price_filter')=='2'?'selected':'' }}>2 - 4 triệu</option>
            <option value="3" {{ request('price_filter')=='3'?'selected':'' }}>Trên 4 triệu</option>
        </select>
    </div>
    <div class="col-md-3 mb-2">
        <button class="btn btn-primary w-100">Tìm kiếm</button>
    </div>
</form>

   <div class="row">
    @forelse($rooms as $room)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($room->images && count($room->images) > 0)
                    <img src="{{ asset('images/' . $room->images[0]) }}" class="card-img-top" alt="{{ $room->title }}">
                @else
                    <img src="https://picsum.photos/400/250?random={{ $loop->index }}" class="card-img-top" alt="{{ $room->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $room->title }}</h5>
                    <p class="card-text"><strong>Giá:</strong> {{ number_format($room->price) }} VNĐ/tháng</p>
                    <p class="card-text"><i class="bi bi-geo-alt"></i> {{ $room->address }}</p>
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-outline-primary w-100">Xem chi tiết</a>
                </div>
            </div>
        </div>
    @empty
        <p>Không có phòng nào.</p>
    @endforelse
</div>
