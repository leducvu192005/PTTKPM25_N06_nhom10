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
        <img src="{{ asset($room->image_path) }}" alt="Ảnh phòng" width="400">
    </div>
</div>
@endsection
