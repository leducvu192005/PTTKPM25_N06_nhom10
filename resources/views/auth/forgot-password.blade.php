@extends('layouts.app')

@section('title', 'Quên mật khẩu')

@section('content')
<div class="container" style="max-width: 400px; margin: 50px auto;">
    <h2>Quên mật khẩu</h2>
    <p>Nhập địa chỉ email của bạn, chúng tôi sẽ gửi liên kết đặt lại mật khẩu.</p>

    @if (session('status'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul style="padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="email">Địa chỉ Email</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                   required autofocus style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div>
            <button type="submit" style="width: 100%; padding: 10px; background: #e53935; color: white; border: none; border-radius: 4px;">
                Gửi link đặt lại mật khẩu
            </button>
        </div>
    </form>

    <p style="margin-top: 15px; text-align: center;">
        <a href="{{ route('login') }}">← Quay lại đăng nhập</a>
    </p>
</div>
@endsection
