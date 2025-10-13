@extends('layouts.app')
 @section('title', 'Đăng tin phòng trọ')
  @section('content')
<form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tiêu đề</label>
        <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề tin" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giá thuê</label>
        <input type="number" name="price" class="form-control" placeholder="VD: 2500000" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" name="address" class="form-control" placeholder="VD: Cầu Giấy, Hà Nội" required>
    </div>
    <div class ="mb-3">
        <label class="form-label">Loại phòng</label>
        <select name="room_type" class="form-select" required>
            <option value="">-- Chọn loại phòng --</option>
            <option value="Phòng trọ">Phòng trọ</option>
            <option value="Chung cư mini">Chung cư mini</option>
            <option value="Nhà nguyên căn">Nhà nguyên căn</option>
            </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="4" placeholder="Mô tả chi tiết phòng..."></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Hình ảnh</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>
    <button type="submit" class="btn btn-success">Đăng tin</button>
</form>
@endsection