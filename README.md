# PTTKPM25_N06_nhom10
Đề tài:# 🏠 Website Tìm Phòng Trọ (Laravel)

Dự án website giúp người dùng dễ dàng tìm kiếm, đăng tin cho thuê và quản lý phòng trọ. Ứng dụng được xây dựng với Laravel framework, nhằm phục vụ bài tập lớn môn [Tên môn học].

---

## 🚀 Tính năng chính

- 🔍 Tìm kiếm phòng trọ theo:
  - Khu vực / Quận
  - Khoảng giá
  - Diện tích
  - Nội thất
- 📝 Đăng tin cho thuê phòng (có hình ảnh)
- 👤 Đăng ký / đăng nhập người dùng
- 📂 Quản lý tin đăng cá nhân (sửa, xoá)
- ❤️ Yêu thích / đánh dấu phòng trọ
- 📦 Phân trang danh sách tin

---

## 🛠️ Công nghệ sử dụng

| Thành phần | Công nghệ         |
|------------|-------------------|
| Backend    | Laravel 10.x       |
| Frontend   | Blade Template + Bootstrap |
| Cơ sở dữ liệu | MySQL / MariaDB    |
| Xác thực   | Laravel Breeze / Jetstream |
| Quản lý gói | Composer, npm       |

---

## 🗂️ Cấu trúc dự án
```
project-root/
├── app/
├── bootstrap/
├── config/
├── database/
│ ├── migrations/
│ └── seeders/
├── public/
│ └── uploads/
├── resources/
│ ├── views/
│ │ ├── home.blade.php
│ │ ├── auth/
│ │ └── components/
│ │ └── card.blade.php
│ └── css/
│ └── style.css
├── routes/
│ └── web.php
├── .env
└── composer.json
