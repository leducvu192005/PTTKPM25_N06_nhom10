@extends('layouts.app')

@section('title', $room->title)

@section('content')
<div class="grid grid-cols-12 gap-6">

  <div class="col-span-9 space-y-6">

    <div class="bg-white shadow rounded-lg p-6">
      <h1 class="text-2xl font-bold text-blue-600 mb-2">{{ $room->title }}</h1>
      <div class="flex items-center justify-between">
        <span class="text-xl font-bold text-red-500">
          {{ number_format($room->price, 0, ',', '.') }} đ/tháng
        </span>
        <span class="text-gray-500">{{ $room->address }}</span>
      </div>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
      <img src="https://via.placeholder.com/800x400"
           alt="Ảnh phòng"
           class="w-full h-[400px] object-cover">
    </div>

    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-lg font-semibold mb-3">Mô tả chi tiết</h2>
      <p class="text-gray-700 leading-relaxed">
        {{ $room->description ?? 'Chưa có mô tả chi tiết.' }}
      </p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-lg font-semibold mb-3">Vị trí trên bản đồ</h2>
      <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
        <iframe
          src="https://maps.google.com/maps?q={{ urlencode($room->address) }}&output=embed"
          width="100%" height="100%" style="border:0;" allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>
    </div>

  </div>

  <aside class="col-span-3 space-y-6">

    <div class="bg-white shadow rounded-lg p-6">
      <h3 class="text-lg font-semibold mb-4">Liên hệ</h3>
      <p><span class="font-medium">Chủ nhà:</span> Nguyễn Văn A</p>
      <p><span class="font-medium">SĐT:</span> 0901 234 567</p>
      <a href="tel:0901234567"
         class="mt-3 block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
        Gọi ngay
      </a>
    </div>


  </aside>
</div>
@endsection
