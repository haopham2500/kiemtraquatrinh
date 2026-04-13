<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lập trình web - Chi tiết</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('user.list') }}">Home</a> | 
            <a href="{{ route('signout') }}">Đăng xuất</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Màn hình chi tiết</h2>
            <div class="form-group">
                <label>Username</label>
                <span>{{ $user->name }}</span> </div>
            <div class="form-group">
                <label>Email</label>
                <span>{{ $user->email }}</span> </div>
           <div style="text-align: right;">
            <a href="{{ route('user.edit', $user->id) }}" class="btn-blue" style="text-decoration: none; display: inline-block;">Chỉnh sửa</a>
        </div>
        </div>
    </main>
    <footer>Lập trình web @04/2026</footer>
</body>
</html>
</html> 