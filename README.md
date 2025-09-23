<<<<<<< HEAD

# PTTKPM25_N06_nhom10
Đề tài:# 🏠 Website Tìm Phòng Trọ (Laravel)

Dự án website giúp người dùng dễ dàng tìm kiếm, đăng tin cho thuê và quản lý phòng trọ. Ứng dụng được xây dựng với Laravel framework.

Thành viên:#
Lê Đức Vũ             MSV:23010608.

Nguyễn Văn Trường     MSV:23010371.

Nguyễn Thị Khánh Linh MSV:23016112.

Nhiệm vụ từng thành viên:#

Backend: Nguyễn Văn Trường

Fontend: Lê Đức Vũ 

Database/Tester: Nguyễn Thị Khánh Linh

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
##Phân tích yêu cầu:
![Use Case Diagram](https://raw.githubusercontent.com/leducvu192005/PTTKPM25_N06_nhom10/main/usecase_web_tim_phong_tro.png)

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

