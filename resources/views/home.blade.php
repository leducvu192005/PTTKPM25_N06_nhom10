@extends('layouts.app')

@section('title', 'Trang chủ - Thuê phòng trọ, nhà đất')

@section('content')

  <!-- Hero section -->
<div class="hero-section position-relative mb-5">
    <img src="{{ asset('assets/background.jpg') }}" 
         alt="Background" 
         class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover">

    <div class="overlay d-flex flex-column justify-content-center align-items-center text-center text-white position-relative" style="z-index:1;">
        <h1 class="mb-3">Tìm phòng trọ, nhà đất dễ dàng</h1>
        <p class="mb-4">Nhanh chóng - Tiện lợi - Chính xác</p>

        <form class="row g-2 bg-white p-3 rounded shadow" style="max-width: 800px;">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Nhập địa điểm, quận/huyện...">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected>Loại phòng</option>
                    <option>Chung cư</option>
                    <option>Chung cư mini</option>
                    <option>Phòng trọ</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>


  <!-- Listing -->
  <div class="container">
    <div class="row">
      @forelse($listings as $listing)
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <a href="{{ route('listings.show', $listing->id) }}">
              <img src="{{ $listing->image ? asset('storage/'.$listing->image) : asset('images/default-room.jpg') }}" 
                   class="card-img-top" alt="Ảnh phòng">
            </a>
            <div class="card-body">
              <h5 class="card-title">
                <a href="{{ route('listings.show', $listing->id) }}" class="text-decoration-none text-dark">
                  {{ $listing->title }}
                </a>
              </h5>
              <p class="text-danger fw-bold">{{ $listing->price }}</p>
              <p class="text-muted small">{{ $listing->area }} m² • {{ $listing->address }}</p>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center">Hiện chưa có phòng trọ nào được đăng.</p>
      @endforelse
    </div>
  </div>
  <div class="hero-section position-relative">
    <img src="{{ asset('F:\TimPhongTro\PTTKPM25_N06_nhom10\public\assets\background.jpg') }}" 
         class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover">
    <div class="overlay position-relative">
    </div>
</div>


@endsection

@push('styles')
<style>
.hero-section {
    position: relative;
    height:600px;
    width: 100vw  ;

    background: url("{{ asset('F:\TimPhongTro\PTTKPM25_N06_nhom10\public\assets\background.jpg') }}") no-repeat center center;
    background-size: cover;
}
.hero-section .overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
}
</style>
@endpush  