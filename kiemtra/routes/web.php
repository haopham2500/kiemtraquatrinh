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