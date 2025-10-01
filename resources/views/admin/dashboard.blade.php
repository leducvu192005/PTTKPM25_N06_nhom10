@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="mb-4">📊 Dashboard</h1>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Người dùng</h5>
                    <p class="card-text fs-3 fw-bold">120</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Tin đăng</h5>
                    <p class="card-text fs-3 fw-bold">350</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Phòng đã thuê</h5>
                    <p class="card-text fs-3 fw-bold">90</p>
                </div>
            </div>
        </div>
    </div>
@endsection
