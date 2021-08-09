<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function signin()
    {
//         User::where("id",1)->update(
//             [
//                 'email' => 'admin@gmail.com',
//                 'password' => Hash::make('123456'),
//             ]
//         );
        return view('Login.signin');

    }

    public function logout()
    {
        if (Auth::check()) {
            (Auth::logout());
            return redirect()->route('index')->with('msg', 'Bạn đã đăng xuất thành công !');
        } else {
            dd("false");
        }
    }

    public function postLogin(Request $request)
    {

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password, 'status' => 1]) || Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1])) {
            $role = (auth()->user()->roles);
            foreach ($role as $roleUser) {
                if ($roleUser->id == '2') {
                    return redirect()->route('index')->with('msg', 'Bạn đăng nhập thành công tài khoản hoặc mật khẩu !');
                }
            }
            return redirect()->route('backend.admin')->with('msg', 'Bạn đăng nhập thành công tài khoản hoặc mật khẩu !');
        } else {
            return redirect()->route('login')->with('msg', 'Bạn đăng nhập sai tài khoản hoặc mật khẩu !');
        }
    }
}
