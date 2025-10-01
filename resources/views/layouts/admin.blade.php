<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" style="min-height: 100vh;">

    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3" style="width: 250px;">
        <h2 class="fs-4 mb-4">Admin Panel</h2>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">📊 Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.index') }}" class="nav-link text-white">👤 Người dùng</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.rooms.index') }}" class="nav-link text-white">🏠 Phòng trọ</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">📂 Danh mục</a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="flex-grow-1">
        <!-- Topbar -->
        <nav class="navbar navbar-light bg-light px-3">
            <span class="navbar-text ms-auto">Xin chào, Admin</span>
        </nav>

        <!-- Main content -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
