@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        {{-- Tổng số người dùng --}}
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Tổng số người dùng</h5>
                <h3 class="text-success">{{ $totalUsers }}</h3>
            </div>
        </div>

        {{-- Tổng số phòng --}}
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Tổng số phòng</h5>
                <h3 class="text-primary">{{ $totalRooms }}</h3>
            </div>
        </div>

        {{-- Số phòng đã duyệt --}}
        <div class="col-md-4">
            <div class="card shadow-sm rounded-4 text-center p-3">
                <h5 class="card-title">Số phòng đã duyệt</h5>
                <h3 class="text-warning">{{ $approvedRooms }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
