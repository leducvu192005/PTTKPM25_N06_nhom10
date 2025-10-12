<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | RoomFinder Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #fff;
            border-right: 1px solid #ddd;
            padding: 1rem;
        }
        .sidebar a {
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #000;
            color: #fff;
        }
        .content {
            margin-left: 270px;
            padding: 1.5rem;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            position: sticky;
            top: 0;
            z-index: 10;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="mb-4">🏢 RoomFinder</h4>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Tổng quan</a>
        <a href="{{ route('admin.rooms') }}" class="{{ request()->routeIs('admin.Room_manage') ? 'active' : '' }}">Quản lý phòng trọ</a>
        <a href="{{ route('admin.tenants') }}" class="{{ request()->routeIs('admin.user.index') ? 'active' : '' }}">Người thuê</a>
        <a href="{{ route('admin.bookings') }}" class="{{ request()->routeIs('admin.bookings') ? 'active' : '' }}">Đặt phòng</a>
        <hr>
        <a href="#" class="text-danger mt-3">Đăng xuất</a>
    </div>

    <div class="content">
        <div class="topbar">
            <h5>@yield('page-title')</h5>
            <div>
                <span class="me-3">admin@roomfinder.com</span>
                <span class="fw-bold">👤 Quản trị viên</span>
            </div>
        </div>

        <div class="mt-3">
            @yield('content')
        </div>
    </div>

</body>
</html>
