<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            overflow: hidden;
            width: 800px;
            max-width: 95%;
        }
        .left {
            flex: 1;
            background: #fde6e6;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
        .right {
            flex: 1;
            padding: 40px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .input-group {
            position: relative;
            margin-bottom: 15px;
        }
        .input-group input {
            width: 100%;
            padding: 10px 40px 10px 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }
        .btn {
            width: 100%;
            background: #e53935;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background: #d32f2f;
        }
        .options {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }
        .social {
            margin: 20px 0;
            text-align: center;
        }
        .social button {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: white;
            cursor: pointer;
        }
        .social button:hover {
            background: #f5f5f5;
        }
        .register {
            text-align: center;
            margin-top: 15px;
        }
        .register a {
            color: #e53935;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left">
        <img src="https://cdn-icons-png.flaticon.com/512/942/942748.png" alt="Illustration" width="250">
    </div>
    <div class="right">
        <h2>Xin chào bạn<br>Đăng nhập để tiếp tục</h2>
        <form method="POST" action="{{ url('/login') }}">

            @csrf
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="login" placeholder="SĐT chính hoặc email" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <button type="submit" class="btn">Đăng nhập</button>
            <div class="options">
                <label><input type="checkbox" name="remember"> Nhớ tài khoản</label>
                <a href="#">Quên mật khẩu?</a>
            </div>
        </form>
        <div class="social">
            <p>Hoặc</p>
            <button><i class="fa-brands fa-apple"></i> Đăng nhập với Apple</button>

            <button><i class="fa-brands fa-google"></i> Đăng nhập với Google</button>
        </div>
        <div class="register">
            Chưa là thành viên? <a href="/register">Đăng ký tại đây</a>
        </div>
    </div>
    
</div>
</body>
</html>
