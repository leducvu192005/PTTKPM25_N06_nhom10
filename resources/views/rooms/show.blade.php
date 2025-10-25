@extends('layouts.app')

@section('title', $room->title)

@section('content')
<div class="grid grid-cols-12 gap-6">

  <!-- CỘT NỘI DUNG CHÍNH (GỘP THÀNH 1 THẺ) -->

  


<!-- ẢNH PHÒNG CHÍNH -->


<div class="w-[36px] h-[360px] rounded-full overflow-hidden bg-gray-100">
    <img id="mainRoomImage"
         src="{{ $room->image_path ? asset('storage/' . $room->image_path) : asset('images/default-room.jpg') }}"
         class="w-full h-full object-cover" 
         style="border-radius: 0; width: 650px; height: 500px; border-radius: 10px;"
         alt="Ảnh phòng chính">
</div>





<!-- ẢNH NHỎ BÊN DƯỚI -->
<div class="d-flex gap-2 flex-wrap">
  @foreach($room->images as $image)
    <img src="{{ asset('storage/' . $image->image_path) }}"
         class="room-thumb rounded-3"
         style="width: 120px; height: 80px; object-fit: cover; cursor: pointer; border: 2px solid transparent;"
         onclick="changeMainImage(this)">
  @endforeach
</div>
<script>
function changeMainImage(el) {
    // Đổi ảnh lớn
    document.getElementById('mainRoomImage').src = el.src;

    // Xóa highlight ảnh cũ
    document.querySelectorAll('.room-thumb').forEach(img => {
        img.classList.remove('active-thumb');
    });

    // Thêm highlight ảnh đang chọn
    el.classList.add('active-thumb');
}
</script>


      <!-- Tiêu đề + giá + địa chỉ -->
    <div>
      <div class="flex flex-wrap items-center justify-between gap-3 border-t pt-4">
        
     <h1 class="text-3xl font-bold text-blue-600 mb-3" style=" font-size: 25px;">{{ $room->title }}</h1>
        <span class="text-2xl font-bold text-red-600">
          {{ number_format($room->price, 0, ',', '.') }} đ/tháng
        </span>
        <span class="text-gray-600 flex items-center gap-2">
          <i class="fa-solid fa-location-dot text-red-500"></i>
          {{ $room->address }}
        </span>


    <!-- Mô tả -->
    <div class="leading-relaxed">
      <h2 class="text-xl font-semibold mb-4" style="font-size: 25px;"> Thông tin chi tiết</h2>
      <p class="text-gray-700">
        {{ $room->description ?? 'Chưa có mô tả chi tiết.' }}
      </p>
    </div>

  </div>
</div>


      <!-- Bản đồ -->
      <div>
        <h2 class="text-xl font-semibold mb-4">📍 Vị trí trên bản đồ</h2>
        <div class="w-full h-72 rounded-xl overflow-hidden border">
          <iframe
            src="https://maps.google.com/maps?q={{ urlencode($room->address) }}&output=embed"
            width="100%" height="100%" style="border:10px;" allowfullscreen=""
            loading="lazy">
          </iframe>
        </div>
      </div>

    </div>

  <!-- CỘT THÔNG TIN LIÊN HỆ (ĐƯA XUỐNG DƯỚI) -->
    
      <h3 class="text-lg font-semibold mb-4">📞 Liên hệ</h3>

<p class="mb-2"><span class="font-medium">Chủ nhà:</span> {{ $room->owner_name ?? 'Đang cập nhật' }}</p>
<p class="mb-4"><span class="font-medium">SĐT:</span> {{ $room->owner_phone ?? 'Đang cập nhật' }}</p>

@if($room->owner_phone)
<a href="tel:{{ $room->owner_phone }}"
   class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
  Gọi ngay
</a>
@endif
  <!-- lưu tin-->
@php
    use App\Models\SavedPost;
    $isSaved = SavedPost::where('user_id', Auth::id())
                ->where('room_id', $room->id)
                ->exists();
@endphp

@if ($isSaved)
    <form action="{{ route('saved.destroy', $room->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">❌ Bỏ lưu</button>
    </form>
@else
    <form action="{{ route('saved.store', $room->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-primary">💾 Lưu tin</button>
    </form>
@endif
  </div>


</div>
@endsection
