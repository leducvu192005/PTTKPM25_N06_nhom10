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
        <li class="nav-item"><a class="nav-link fw-semibold" href="{{ url('/rooms') }}">Danh sách phòng</a></li>
<li class="nav-item"><a class="nav-link fw-semibold" href="{{ url('/rooms/create') }}">Đăng tin</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
            <i class="fa-solid fa-user"></i> Tài khoản
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
             <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
