<?php

use Illuminate\Support\Facades\Route;


// 2. Trang Đăng nhập (Login)
Route::get('/login', function () {
    return view('crud_user.login');
})->name('login');

// 3. Trang Đăng ký (Register)
Route::get('/register', function () {
    return view('crud_user.register');
});

// 4. Trang Danh sách người dùng (List)
Route::get('/users', function () {
    return view('crud_user.list');
});

// 5. Trang Xem chi tiết (View)
Route::get('/user/detail', function () {
    return view('crud_user.view');
});

// 6. Trang Chỉnh sửa (Update)
Route::get('/user/edit', function () {
    return view('crud_user.update');
});

Route::get('/', function () {
    return view('welcome');
});
