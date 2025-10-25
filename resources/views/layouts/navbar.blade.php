<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase" href="{{ url('/') }}">
      <i class="fa-solid fa-house-chimney"></i> TimPhongTro
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        @auth
          <!-- ✅ Tin đã lưu -->
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ route('saved.index') }}">
              <i class="fa-solid fa-heart"></i> Tin đã lưu
            </a>
          </li>

          <!-- ✅ Danh sách phòng -->
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ url('/my-rooms') }}">
              <i class="fa-solid fa-list"></i> Danh sách phòng
            </a>
          </li>

          <!-- ✅ Đăng tin -->
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="{{ url('/rooms/create') }}">
              <i class="fa-solid fa-plus-circle"></i> Đăng tin
            </a>
          </li>

          <!-- ✅ Menu người dùng -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
              <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ url('/profile') }}">Hồ sơ</a></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="dropdown-item" type="submit">Đăng xuất</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth

        @guest
          <!-- ✅ Khi chưa đăng nhập -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
              <i class="fa-solid fa-user"></i> Tài khoản
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ url('/login') }}">Đăng nhập</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
            </ul>
          </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>
