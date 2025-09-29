@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-3">
                <img src="https://via.placeholder.com/800x400" class="card-img-top rounded-top" alt="Ảnh phòng trọ">
                <div class="card-body">
                    <h2 class="fw-bold text-primary mb-2">Phòng trọ đẹp 20m² - Full nội thất</h2>
                    <p class="text-muted mb-3">
                        <i class="fa-solid fa-location-dot text-danger"></i>
                        Ngõ 282 Phố Định Công, Hoàng Mai, Hà Nội
                    </p>
                    
                    <div class="mb-3">
                        <p class="mb-1"><span class="fw-bold">Giá thuê:</span> <span class="text-danger fw-bold">2.5 triệu/tháng</span></p>
                        <p class="mb-1"><span class="fw-bold">Diện tích:</span> 20m²</p>
                    </div>
                    
                    <hr>
                    
                    <h5 class="fw-bold mb-2">Mô tả chi tiết</h5>
                    <p>
                        Phòng trọ riêng biệt trong căn hộ 45m², đầy đủ nội thất gồm giường, tủ, bàn ghế,
                        điều hòa, nóng lạnh. Phòng thoáng mát, an ninh tốt, giờ giấc thoải mái. 
                        Vị trí thuận tiện: gần chợ, trường học và bến xe bus.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Thông tin liên hệ</h5>
                    <p class="mb-1"><i class="fa-solid fa-user text-secondary"></i> Nguyễn Văn A</p>
                    <p class="mb-1"><i class="fa-solid fa-phone text-success"></i> 0912 345 678</p>
                    <p class="mb-3"><i class="fa-brands fa-facebook-messenger text-primary"></i> Zalo: 0912 345 678</p>
                    <button class="btn btn-success w-100">
                        <i class="fa-solid fa-phone-volume"></i> Gọi ngay
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
