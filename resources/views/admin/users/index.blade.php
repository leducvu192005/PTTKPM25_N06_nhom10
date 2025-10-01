@extends('layouts.admin')

@section('title', 'Quản lý Người dùng')

@section('content')
    <h1 class="mb-4">👤 Quản lý Người dùng</h1>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nguyễn Văn A</td>
                <td>a@example.com</td>
                <td>User</td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">Sửa</a>
                    <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
