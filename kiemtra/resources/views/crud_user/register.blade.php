
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lập trình web - Đăng ký</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav><a href="index">Home</a> | <a href="login">Đăng nhập</a> | <a href="register.html"><b>Đăng ký</b></a></nav>
    </header>
    <main>
        <div class="container">
            <h2>Màn hình đăng ký</h2>
            <form action="{{ route('user.postUser') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="name"> </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password" name="password"> </div>
    <div class="form-group">
        <label>Nhập lại mật khẩu</label>
        <input type="password"> </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email"> </div>
    <div class="actions" style="justify-content: flex-end;">
        <a href="login" class="link-blue" style="margin-right: 20px;">Đã có tài khoản</a>
        <button type="submit" class="btn-blue">Đăng ký</button>
    </div>
</form>
        </div>
    </main>
    <footer>Lập trình web @01/2024</footer>
</body>
</html>
