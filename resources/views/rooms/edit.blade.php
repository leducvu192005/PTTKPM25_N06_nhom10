@extends('layouts.app')

@section('title', 'Chỉnh sửa phòng trọ')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
  <h1 class="text-2xl font-bold mb-6">Chỉnh sửa thông tin phòng</h1>

  <form method="POST" action="{{ route('rooms.update', $room->id) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-sm font-medium mb-1">Tiêu đề</label>
      <input type="text" name="title" value="{{ old('title', $room->title) }}"
             class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
      @error('title')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Giá (VNĐ/tháng)</label>
      <input type="number" name="price" value="{{ old('price', $room->price) }}"
             class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
      @error('price')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Địa chỉ</label>
      <input type="text" name="address" value="{{ old('address', $room->address) }}"
             class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
      @error('address')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Mô tả</label>
      <textarea name="description" rows="5"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('description', $room->description) }}</textarea>
      @error('description')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex justify-end space-x-3">
      <a href="{{ route('rooms.index') }}"
         class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
        Hủy
      </a>
      <button type="submit"
              class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        Cập nhật
      </button>
    </div>
  </form>
</div>
@endsection
