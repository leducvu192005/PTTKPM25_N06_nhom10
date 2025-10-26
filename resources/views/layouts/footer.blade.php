<footer class="bg-dark text-light pt-5 mt-auto">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h4 class="fw-bold text-uppercase"><i class="fa-solid fa-house-chimney"></i> TimPhongTro</h4>
        <p>Tìm phòng trọ, nhà ở nhanh chóng và tiện lợi nhất tại Hà Nội và toàn quốc.</p>
      </div>

      <div class="col-md-4 mb-3">
        <h5 class="fw-bold">Liên kết nhanh</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('listings.index') }}" class="text-light text-decoration-none">Danh sách phòng</a></li>
          <li><a href="{{ route('rooms.create') }}" class="text-light text-decoration-none">Đăng tin</a></li>
          <li><a href="{{ route('login') }}" class="text-light text-decoration-none">Đăng nhập</a></li>
        </ul>
      </div>

      <div class="col-md-4 mb-3">
        <h5 class="fw-bold">Liên hệ</h5>
        <p><i class="fa-solid fa-envelope"></i> support@timphongtro.com</p>
        <p><i class="fa-solid fa-phone"></i> 0123-456-789</p>
        <div>
          <a href="#" class="text-light me-2"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-light me-2"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" class="text-light"><i class="fab fa-youtube fa-lg"></i></a>
        </div>
      </div>
    </div>
    <hr class="border-light">
    <p class="text-center small">&copy; {{ date('Y') }} TimPhongTro. All rights reserved.</p>
  </div>
</footer>
