<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    // 1. Trang Đăng ký: Gọi đúng file register của ní
    public function createUser() {
        return view('crud_user.register'); 
    }

    // 2. Xử lý Đăng ký: Chỉ lấy Name, Email, Password (KHÔNG Phone/Address)
    public function postUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
    'name'     => $request->input('name'),
    'email'    => $request->input('email'),
    'password' => Hash::make($request->input('password')),
]);

        return redirect("login")->with('success', 'Đăng ký thành công!');
    }

    // 3. Trang Đăng nhập
    public function login() {
        return view('crud_user.login');
    }

    // 4. Xử lý Đăng nhập
    public function authUser(Request $request) {
    $credentials = [
        'name'     => $request->input('username'), // Bốc dữ liệu từ ô có name="username"
        'password' => $request->input('password'),
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->intended('list');
    }

    return back()->withErrors(['error' => 'Sai tài khoản hoặc mật khẩu!']);
}

    // 5. Danh sách và Đăng xuất
    public function listUser() {
        if(Auth::check()){
            return view('crud_user.list', ['users' => User::all()]);
        }
        return redirect("login");
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}