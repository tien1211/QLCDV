<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function username()
    {
        return 'cdv_username';
    }

    public function getLogin()
    {
        return view('frontend.login'); //return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'cdv_username' => $request->Username,
            'cdv_password' => $request->Password
        ];

        if (Auth::attempt($arr)) {
            //return redirect()->route("admin");#chuyển về trang chủ
            echo "Thành Công Nè";
        } else {
            echo "Thất bại nè";
            //return redirect()->back()
            //->withInput()->with("error", "Sai tài khoản hoặc mật khẩu");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("admin");#chuyển về trang chủ
    }

}
