<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Lập trình web - Danh sách</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav><a href="/">Home</a> | <a href="/login">Đăng xuất</a></nav>
    </header>
    <main style="display: block; width: 80%; margin: 20px auto;">
        <h2 style="text-align: center;">Danh sách user</h2>
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}">Edit</a> |
                        <a href="{{ route('user.view', $user->id) }}">View</a> |
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}">Edit</a> |
                        <a href="{{ route('user.view', $user->id) }}">View</a> |
                        <a href="{{ route('user.delete', $user->id) }}"
                            onclick="return confirm('Ní có chắc muốn xóa người này không?')">
                            Delete
                        </a>
                    </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="#" class="link-blue">Previous</a> 1 2 3 <a href="#" class="link-blue">Next</a>
        </div>
    </main>
    <footer>Lập trình web @01/2024</footer>
</body>

</html>