<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa User</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container" style="width: 50%; margin: 50px auto; border: 1px solid #ccc; padding: 20px;">
        <h2>Chỉnh sửa thông tin User</h2>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label>Username:</label><br>
                <input type="text" name="name" value="{{ $user->name }}" style="width: 100%; padding: 8px;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Email:</label><br>
                <input type="email" name="email" value="{{ $user->email }}" style="width: 100%; padding: 8px;">
            </div>

            <div style="text-align: right;">
                <a href="{{ route('user.list') }}" style="margin-right: 10px;">Hủy bỏ</a>
                <button type="submit" class="btn-blue" style="padding: 8px 20px; background: blue; color: white; border: none; cursor: pointer;">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</body>
</html>