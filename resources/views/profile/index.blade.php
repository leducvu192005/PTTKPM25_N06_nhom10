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
              <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab">
                <i class="fa-solid fa-clock-rotate-left me-1"></i> Lịch sử thuê phòng
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
              <form>
                <div class="text-center mb-4">
                  <img src="https://via.placeholder.com/120"
                       alt="Avatar"
                       class="rounded-circle border shadow-sm"
                       width="120" height="120">
                  <div class="mt-2">
                    <button type="button" class="btn btn-outline-primary btn-sm">Thay ảnh</button>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label fw-semibold">Họ và tên</label>
                  <input type="text" class="form-control" id="name" value="Nguyễn Văn A">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label fw-semibold">Email</label>
                  <input type="email" class="form-control" id="email" value="nguyenvana@gmail.com" disabled>
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label fw-semibold">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone" value="0901234567">
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label fw-semibold">Địa chỉ</label>
                  <input type="text" class="form-control" id="address" value="Hà Nội, Việt Nam">
                </div>

                <div class="d-flex justify-content-end">
                  <button type="reset" class="btn btn-outline-secondary me-2">Hủy</button>
                  <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                </div>
              </form>
            </div>

            <!-- Lịch sử thuê phòng -->
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
              <div class="table-responsive mt-3">
                <table class="table table-striped align-middle">
                  <thead class="table-primary">
                    <tr>
                      <th>#</th>
                      <th>Tên phòng</th>
                      <th>Địa chỉ</th>
                      <th>Giá thuê</th>
                      <th>Thời gian</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Phòng trọ Nguyễn Trãi</td>
                      <td>Hà Đông, Hà Nội</td>
                      <td>2.500.000đ/tháng</td>
                      <td>01/09/2024 - 01/03/2025</td>
                      <td><span class="badge bg-success">Đang thuê</span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Phòng trọ Láng Hạ</td>
                      <td>Đống Đa, Hà Nội</td>
                      <td>3.000.000đ/tháng</td>
                      <td>01/03/2024 - 01/09/2024</td>
                      <td><span class="badge bg-secondary">Đã trả</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Đổi mật khẩu -->
            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
              <form class="mt-3">
                <div class="mb-3">
                  <label for="oldPassword" class="form-label fw-semibold">Mật khẩu hiện tại</label>
                  <input type="password" class="form-control" id="oldPassword" placeholder="Nhập mật khẩu hiện tại">
                </div>
                <div class="mb-3">
                  <label for="newPassword" class="form-label fw-semibold">Mật khẩu mới</label>
                  <input type="password" class="form-control" id="newPassword" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="mb-3">
                  <label for="confirmPassword" class="form-label fw-semibold">Xác nhận mật khẩu mới</label>
                  <input type="password" class="form-control" id="confirmPassword" placeholder="Nhập lại mật khẩu mới">
                </div>

                <div class="d-flex justify-content-end">
                  <button type="reset" class="btn btn-outline-secondary me-2">Hủy</button>
                  <button type="submit" class="btn btn-primary px-4">Cập nhật</button>
                </div>
              </form>
            </div>

          </div> <!-- /tab-content -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
