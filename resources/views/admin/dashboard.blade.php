@extends('layouts.admin')

@section('title', 'Trang tổng quan')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tổng quan hệ thống</h1>

    {{-- Thống kê nhanh --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="text-gray-500 text-sm mb-1">Tổng số phòng</div>
            <div class="text-3xl font-bold text-indigo-600">42</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="text-gray-500 text-sm mb-1">Số người thuê</div>
            <div class="text-3xl font-bold text-green-600">28</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="text-gray-500 text-sm mb-1">Đơn đặt phòng</div>
            <div class="text-3xl font-bold text-yellow-600">12</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="text-gray-500 text-sm mb-1">Phòng trống</div>
            <div class="text-3xl font-bold text-red-600">6</div>
        </div>
    </div>

    {{-- Bảng danh sách đặt phòng gần đây --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Đặt phòng gần đây</h2>
            <a href="#" class="text-indigo-600 text-sm hover:underline">Xem tất cả</a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã ĐP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Khách hàng</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phòng</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày vào</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">BK001</td>
                    <td class="px-6 py-4 text-sm text-gray-500">Nguyễn Văn A</td>
                    <td class="px-6 py-4 text-sm text-gray-500">P101</td>
                    <td class="px-6 py-4 text-sm text-gray-500">15/11/2025</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Chờ duyệt
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">BK002</td>
                    <td class="px-6 py-4 text-sm text-gray-500">Trần Thị B</td>
                    <td class="px-6 py-4 text-sm text-gray-500">P205</td>
                    <td class="px-6 py-4 text-sm text-gray-500">01/12/2025</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Đã xác nhận
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">BK003</td>
                    <td class="px-6 py-4 text-sm text-gray-500">Lê Minh C</td>
                    <td class="px-6 py-4 text-sm text-gray-500">P302</td>
                    <td class="px-6 py-4 text-sm text-gray-500">10/12/2025</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Từ chối
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
