<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use Session;
use App\CongDoanVien;

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
            'cdv_username' => $request->cdv_username,
            'password' => $request->password
        ];

        if (Auth::attempt($arr)) {
            return redirect()->route("admin");#chuyển về trang chủ

        } else {

            return redirect()->back()
            ->withInput()->with("error", "Sai tài khoản hoặc mật khẩu");
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route("trangchu");#chuyển về đăng nhập
    }


    public function getChangePass($id){
        $ar = CongDoanVien::find($id);
        return view('frontend.formChange')->with('ar',$ar);
    }

    public function postChangePass(Request $request, $id){
        $usr = CongDoanVien::find($id);
        

                $arrr = [
                        'cdv_username'  => $usr->cdv_username,
                        'password'      => $request->old_password
                ];
           
           if (Auth::attempt($arrr)) {
                

                    $usr->password =bcrypt($request->new_password);

                     $usr->save();

                    Session::flash('alert-success', 'Đổi mật khẩu thành công!!');
                    return redirect::back();
           }else{
            Session::flash('alert-warning', 'Đổi Mật Khẩu Thất Bại!!');
            return redirect::back();
           }
            
            


    }

}
