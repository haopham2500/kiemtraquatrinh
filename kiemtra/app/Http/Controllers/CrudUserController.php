<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    // 1. Hàm Xem chi tiết
public function viewUser($id) {
    $user = User::findOrFail($id);
    return view('crud_user.view', compact('user'));
}

// 2. Hàm Hiện form sửa
public function editUser($id) {
    $user = User::findOrFail($id);
    return view('crud_user.edit', compact('user'));
}

// 3. Hàm Lưu dữ liệu đã sửa
public function updateUser(Request $request, $id) {
    $user = User::findOrFail($id);
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('user.list')->with('success', 'Cập nhật thành công!');
}
public function deleteUser($id) {
    $user = User::findOrFail($id);
    $user->delete();
    
    // Xóa xong thì quay về trang danh sách kèm thông báo
    return redirect()->route('user.list')->with('success', 'Đã xóa người dùng thành công!');
}
}