@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Quản lý đặt phòng</h1>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Mã ĐP</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Khách hàng</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Phòng</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Giá thuê</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Đặt cọc</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Ngày vào</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Trạng thái</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider text-center">Hành động</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">

                {{-- Lặp dữ liệu --}}
                @foreach ($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition">
                        {{-- Mã --}}
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $booking->code }}</td>

                        {{-- Khách hàng --}}
                        <td class="px-6 py-4 text-sm">
                            <div class="font-medium text-gray-900">{{ $booking->customer->name }}</div>
                            <div class="text-gray-500">{{ $booking->customer->phone }}</div>
                        </td>

                        {{-- Phòng --}}
                        <td class="px-6 py-4 text-sm">
                            <div class="font-medium text-gray-900">{{ $booking->room->name }}</div>
                            <div class="text-gray-500">{{ $booking->room->area }}</div>
                        </td>

                        {{-- Giá thuê --}}
                        <td class="px-6 py-4 text-sm text-gray-900">₫{{ number_format($booking->rental_price, 0, ',', '.') }}</td>

                        {{-- Đặt cọc --}}
                        <td class="px-6 py-4 text-sm text-gray-900">₫{{ number_format($booking->deposit_amount, 0, ',', '.') }}</td>

                        {{-- Ngày vào --}}
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $booking->check_in_date->format('d/m/Y') }}</td>

                        {{-- Trạng thái --}}
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if ($booking->status === 'Chờ duyệt')
                                    bg-yellow-100 text-yellow-800
                                @elseif ($booking->status === 'Đã xác nhận')
                                    bg-green-100 text-green-800
                                @else
                                    bg-red-100 text-red-800
                                @endif">
                                {{ $booking->status }}
                            </span>
                        </td>

                        {{-- Hành động --}}
                        <td class="px-6 py-4 text-sm text-center">
                            @if ($booking->status === 'Chờ duyệt')
                                <div class="flex justify-center space-x-2">
                                    <form method="POST" action="{{ route('bookings.approve', $booking) }}">
                                        @csrf
                                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-medium hover:bg-green-700 shadow-sm">
                                            ✓ Duyệt
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('bookings.reject', $booking) }}">
                                        @csrf
                                        <button type="submit" class="bg-gray-300 text-gray-800 px-3 py-1 rounded-lg text-xs font-medium hover:bg-gray-400 shadow-sm">
                                            ✗ Từ chối
                                        </button>
                                    </form>
                                </div>
                            @elseif ($booking->status === 'Đã xác nhận')
                                <span class="text-gray-500 text-xs italic">Đã xác nhận</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

                {{-- Dữ liệu mẫu (nếu không có dữ liệu thật) --}}
                @if ($bookings->isEmpty())
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-gray-500 italic">
                            Chưa có đơn đặt phòng nào.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
