@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
          <h4 class="mb-0"><i class="fa-solid fa-user-circle me-2"></i>Hồ sơ khách hàng</h4>
        </div>

        <div class="card-body p-4">
          <!-- Tabs -->
          <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">
                <i class="fa-solid fa-id-card me-1"></i> Thông tin cá nhân
              </button>
            </li>
        
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">
                <i class="fa-solid fa-lock me-1"></i> Đổi mật khẩu
              </button>
            </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content" id="profileTabsContent">
            
            <!-- Thông tin cá nhân -->
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
              <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="text-center mb-4">
                @php
  $avatar = isset($user->avatar) && $user->avatar 
      ? asset($user->avatar) 
      : 'https://via.placeholder.com/120';
@endphp

<img src="{{ $avatar }}" 
     alt="Avatar"
     class="rounded-circle border shadow-sm"
     width="120" height="120">

                  <div class="mt-2">
                    <input type="file" name="avatar" class="form-control w-50 mx-auto">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label fw-semibold">Họ và tên</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label fw-semibold">Email</label>
                  <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label fw-semibold">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone_number) }}">
                </div>


                <div class="d-flex justify-content-end">
                  <button type="reset" class="btn btn-outline-secondary me-2">Hủy</button>
                  <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                </div>
              </form>
            </div>

            <!-- Đổi mật khẩu -->
            @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

         <!-- Đổi mật khẩu -->
<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
  <form class="mt-3" method="POST" action="{{ route('profile.changePassword') }}">
    @csrf

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
      <label for="oldPassword" class="form-label fw-semibold">Mật khẩu hiện tại</label>
      <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Nhập mật khẩu hiện tại" required>
    </div>

    <div class="mb-3">
      <label for="newPassword" class="form-label fw-semibold">Mật khẩu mới</label>
      <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nhập mật khẩu mới" required>
    </div>

    <div class="mb-3">
      <label for="newPassword_confirmation" class="form-label fw-semibold">Xác nhận mật khẩu mới</label>
      <input type="password" class="form-control" id="newPassword_confirmation" name="newPassword_confirmation" placeholder="Nhập lại mật khẩu mới" required>
    </div>

    <div class="d-flex justify-content-end">
      <button type="reset" class="btn btn-outline-secondary me-2">Hủy</button>
      <button type="submit" class="btn btn-primary px-4">Cập nhật</button>
    </div>
  </form>
</div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
