<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

// Route cho trang Đăng ký
Route::get('register', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');

// Route cho Đăng nhập
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');


Route::get('/', function () {
    return redirect()->route('user.list');
}
);

// Route Xem chi tiết
Route::get('/view/{id}', [CrudUserController::class, 'viewUser'])->name('user.view');

// Route Chỉnh sửa (Cần 2 cái: 1 để hiện form, 1 để lưu dữ liệu)
Route::get('/edit/{id}', [CrudUserController::class, 'editUser'])->name('user.edit');
Route::post('/update/{id}', [CrudUserController::class, 'updateUser'])->name('user.update');
Route::get('/delete/{id}', [CrudUserController::class, 'deleteUser'])->name('user.delete');

