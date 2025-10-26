@extends('layouts.admin')

@section('title', 'Chi tiết phòng')
@section('page-title', 'Chi tiết phòng')

@section('content')
<div class="card">
    <div class="card-body">
        <h5>{{ $room->title }}</h5>
        <p><strong>Địa chỉ:</strong> {{ $room->address }}</p>
        <p><strong>Giá:</strong> {{ number_format($room->price) }} VND</p>
        <p><strong>Mô tả:</strong> {{ $room->description }}</p>
        <p><strong>Trạng thái:</strong> {{ $room->status }}</p>
        <img src="{{ asset('storage/' . $room->image_path) }}" alt="Ảnh phòng" width="400">

    </div>
    <h4 class="text-lg font-semibold mt-6">Đánh giá người dùng</h4>
@foreach ($room->reviews as $review)
    <div class="border rounded p-3 mt-2">
        <strong>{{ $review->user->name }}</strong> - ⭐ {{ $review->rating }}/5
        <p>{{ $review->comment }}</p>
    </div>
@endforeach

</div>
@endsection
