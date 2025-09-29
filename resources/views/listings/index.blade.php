@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="mb-4 fw-bold">Danh sách phòng trọ</h2>

    <div class="row g-4">
        @foreach ($listings as $listing)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <a href="{{ route('listings.show', $listing->id) }}">
                    <img src="{{ $listing->image ? asset('storage/' . $listing->image) : 'https://via.placeholder.com/400x250' }}" 
                         class="card-img-top rounded-top" 
                         alt="Ảnh phòng trọ">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">
                        <a href="{{ route('listings.show', $listing->id) }}" class="text-decoration-none text-dark">
                            {{ $listing->title }}
                        </a>
                    </h5>
                    <p class="card-text text-muted">
                        Diện tích: {{ $listing->area }}m² - Giá: {{ number_format($listing->price, 0, ',', '.') }} triệu/tháng
                    </p>
                    <p class="text-truncate">{{ $listing->description }}</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ $listing->location }}</small>
                    <a href="{{ route('listings.show', $listing->id) }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
