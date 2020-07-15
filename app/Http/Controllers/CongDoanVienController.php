<?php

namespace App\Http\Controllers;
use App\CongDoanVien;
use Illuminate\Http\Request;
use App\ChucVu;
use App\LoaiNhanVien;
use App\MucHoTro;
use App\TaiKhoan;
use Validator;
use Session;
class CongDoanVienController extends Controller
{

    function __construct(){
		$ChucVu = ChucVu::all();
    	$LoaiNhanVien = LoaiNhanVien::all();
        $MucHoTro = MucHoTro::all();
        $TaiKhoan = TaiKhoan::all();
    	view()->share('ChucVu',$ChucVu);
        view()->share('LoaiNhanVien',$LoaiNhanVien);
        view()->share('MucHoTro',$MucHoTro);
        view()->share('TaiKhoan',$TaiKhoan);
	}



    public function getDanhSach(){
        $CongDoanVien = CongDoanVien::all();
        return view('admin.CongDoanVien.danhsach')->with('CongDoanVien',$CongDoanVien);
    }


    public function getThem(){
        return view('admin.CongDoanVien.them');
    }

    public function postThem(Request $request){
        $this->validate($request, [
            'cv_id' => 'required',
            'lnv_id' => 'required',
            'mht_id'=>'required',
            'cdv_ten'=>'bail|required',
            'cdv_ngaysinh'=>'required',
            'cdv_gioitinh'=>'required',
            'cdv_cmnd'=>'required|max:10|min:10',
            'cdv_nguyenquan'=>'required',
            'cdv_diachi'=>'bail|required',
            'cdv_sdt'=>'required|max:10|min:10',
            'cdv_email'=>'required',
            'cdv_dantoc'=>'required',
            'cdv_trinhdo'=>'required',
            'cdv_tongiao'=>'bail|required',
            'cdv_ngayvaocd'=>'required',
            'cdv_ngayvaonganh'=>'required',
            'tk_tendangnhap'=>'bail|required|unique:TaiKhoan',
            'tk_matkhau'=>'required|min:8|max:50',
            'confirm_password'=>'required|same:tk_matkhau',
            ],[
                'cv_id.required' => 'Vui lòng không được để trống chức vụ',
                'lnv_id.required' => 'Vui lòng không được để trống loại nhân viên',
                'mht_id.required'=>'Vui lòng không được để trống mức hổ trợ',
                'cdv_ten.required'=>'Vui lòng không được để trống tên công đoàn viên',
                'cdv_ngaysinh.required'=>'Vui lòng không được để trống ngày sinh',
                'cdv_gioitinh.required'=>'Vui lòng không được để trống giới tính',
                'cdv_cmnd.required' => 'Vui lòng không được để trống CMND',
                'cdv_cmnd.min' => 'CMND phải ít nhất 10 kí tự',
                'cdv_cmnd.max' => 'CMND phải không quá 10 kí tự',
                'cdv_nguyenquan.required'=>'Vui lòng không được để trống nguyên quán',
                'cdv_diachi.required'=>'Vui lòng không được để trống địa chỉ',
                'cdv_sdt.required'=>'Vui lòng không được để trống số điện thoại',
                'cdv_cmnd.min' => 'Số điện thoại phải ít nhất 10 kí tự',
                'cdv_cmnd.max' => 'Số điện thoại phải không quá 10 kí tự',
                'cdv_email.required'=>'Vui lòng không được để trống email',
                'cdv_dantoc.required'=>'Vui lòng không được để trống dân tộc',
                'cdv_trinhdo.required'=>'Vui lòng không được để trống trình độ',
                'cdv_tongiao.required'=>'Vui lòng không được để trống tôn giáo',
                'cdv_ngayvaocd.required'=>'Vui lòng không được để trống ngày vào công đoàn',
                'cdv_ngayvaonganh.required'=>'Vui lòng không được để trống ngày vào ngành',
                'tk_tendangnhap.required'=>'Vui lòng không được để trống tên đăng nhập',
                'tk_tendangnhap.unique'=>'Tên đăng nhập đã tồn tại',
                'tk_matkhau.required'=>'Vui lòng không được để trống mật khẩu',
                'tk_matkhau.min'=>'Mật khẩu phải ít nhất 8 kí tự',
                'tk_matkhau.max' => 'Mật khẩu không được quá 50 kí tự',
                'confirm_password.required'=>'Vui lòng không được để trống xác nhận mật khẩu',
                'confirm_password.same' => 'Mật khẩu không trùng khớp'

               
            ]);
            $TaiKhoan = new TaiKhoan();
            $CongDoanVien = new CongDoanVien();
            $CongDoanVien->tc_id = 1;
            $CongDoanVien->cv_id = $request->cv_id;
            $CongDoanVien->lnv_id = $request->lnv_id;
            $CongDoanVien->mht_id = $request->mht_id;
            $CongDoanVien->cdv_ten = $request->cdv_ten;
            $CongDoanVien->cdv_ngaysinh = $request->cdv_ngaysinh;
            $CongDoanVien->cdv_gioitinh = $request->cdv_gioitinh;
            $CongDoanVien->cdv_cmnd = $request->cdv_cmnd;
            $CongDoanVien->cdv_nguyenquan = $request->cdv_nguyenquan;
            $CongDoanVien->cdv_diachi = $request->cdv_diachi;
            $CongDoanVien->cdv_sdt = $request->cdv_sdt;
            $CongDoanVien->cdv_email = $request->cdv_email;
            $CongDoanVien->cdv_dantoc = $request->cdv_dantoc;
            $CongDoanVien->cdv_trinhdo = $request->cdv_trinhdo;
            $CongDoanVien->cdv_tongiao = $request->cdv_tongiao;
            $CongDoanVien->cdv_ngayvaocd = $request->cdv_ngayvaocd;
            $CongDoanVien->cdv_ngayvaonganh = $request->cdv_ngayvaonganh;
            $CongDoanVien->cdv_trangthai = 1;
            if($request->hasFile('cdv_hinhanh')){
                $file = $request->file('cdv_hinhanh');
                $duoi = $file->getClientOriginalExtension();
    
                if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                    Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                    return redirect()->route('CDV_Them');
                }
    
                $name = $file->getClientOriginalName();
                $file->move("upload/cdv",$name);
                $CongDoanVien->cdv_hinhanh = $name;
    
            }else{
                $CongDoanVien->cdv_hinhanh=""; 
            }
            $CongDoanVien->save();
            $TaiKhoan->tk_tendangnhap = $request->tk_tendangnhap;
            $TaiKhoan->cdv_id = $CongDoanVien->cdv_id;
            $TaiKhoan->tk_matkhau =bcrypt($request->tk_matkhau);
            $TaiKhoan->tk_quyen = $request->tk_quyen;
            $TaiKhoan->tk_trangthai = 1;
            $TaiKhoan->save();

            Session::flash('alert-info', 'Thêm thành công!!!');
            return redirect()->route('CDV_Them');    
    }


    public function getSua($id){
        
        $CongDoanVien =  CongDoanVien::find($id);
        $TaiKhoan =  TaiKhoan::find($id);
        
        return view('admin.CongDoanVien.sua')->with('CongDoanVien',$CongDoanVien)->with('TaiKhoan',$TaiKhoan);
        
    }


    public function postSua(Request $request, $id){
        $this->validate($request, [
            'cv_id' => 'required',
            'lnv_id' => 'required',
            'mht_id'=>'required',
            'cdv_ten'=>'bail|required',
            'cdv_ngaysinh'=>'required',
            'cdv_gioitinh'=>'required',
            'cdv_cmnd'=>'required|max:10|min:10',
            'cdv_nguyenquan'=>'required',
            'cdv_diachi'=>'bail|required',
            'cdv_sdt'=>'required|max:10|min:10',
            'cdv_email'=>'required',
            'cdv_dantoc'=>'required',
            'cdv_trinhdo'=>'required',
            'cdv_tongiao'=>'bail|required',
            'cdv_ngayvaocd'=>'required',
            'cdv_ngayvaonganh'=>'required',
            'tk_tendangnhap'=>'bail|required|unique:TaiKhoan',
            'tk_matkhau'=>'required|min:8|max:50',
            'confirm_password'=>'required|same:tk_matkhau',
            ],[
                'cv_id.required' => 'Vui lòng không được để trống chức vụ',
                'lnv_id.required' => 'Vui lòng không được để trống loại nhân viên',
                'mht_id.required'=>'Vui lòng không được để trống mức hổ trợ',
                'cdv_ten.required'=>'Vui lòng không được để trống tên công đoàn viên',
                'cdv_ngaysinh.required'=>'Vui lòng không được để trống ngày sinh',
                'cdv_gioitinh.required'=>'Vui lòng không được để trống giới tính',
                'cdv_cmnd.required' => 'Vui lòng không được để trống CMND',
                'cdv_cmnd.min' => 'CMND phải ít nhất 10 kí tự',
                'cdv_cmnd.max' => 'CMND phải không quá 10 kí tự',
                'cdv_nguyenquan.required'=>'Vui lòng không được để trống nguyên quán',
                'cdv_diachi.required'=>'Vui lòng không được để trống địa chỉ',
                'cdv_sdt.required'=>'Vui lòng không được để trống số điện thoại',
                'cdv_cmnd.min' => 'Số điện thoại phải ít nhất 10 kí tự',
                'cdv_cmnd.max' => 'Số điện thoại phải không quá 10 kí tự',
                'cdv_email.required'=>'Vui lòng không được để trống email',
                'cdv_dantoc.required'=>'Vui lòng không được để trống dân tộc',
                'cdv_trinhdo.required'=>'Vui lòng không được để trống trình độ',
                'cdv_tongiao.required'=>'Vui lòng không được để trống tôn giáo',
                'cdv_ngayvaocd.required'=>'Vui lòng không được để trống ngày vào công đoàn',
                'cdv_ngayvaonganh.required'=>'Vui lòng không được để trống ngày vào ngành',
                'tk_tendangnhap.required'=>'Vui lòng không được để trống tên đăng nhập',
                'tk_tendangnhap.unique'=>'Tên đăng nhập đã tồn tại',
                'tk_matkhau.required'=>'Vui lòng không được để trống mật khẩu',
                'tk_matkhau.min'=>'Mật khẩu phải ít nhất 8 kí tự',
                'tk_matkhau.max' => 'Mật khẩu không được quá 50 kí tự',
                'confirm_password.required'=>'Vui lòng không được để trống xác nhận mật khẩu',
                'confirm_password.same' => 'Mật khẩu không trùng khớp'

               
            ]);
            $TaiKhoan = TaiKhoan::find($id);
            $CongDoanVien = CongDoanVien::find($id);
            $CongDoanVien->tc_id = 1;
            $CongDoanVien->cv_id = $request->cv_id;
            $CongDoanVien->lnv_id = $request->lnv_id;
            $CongDoanVien->mht_id = $request->mht_id;
            $CongDoanVien->cdv_ten = $request->cdv_ten;
            $CongDoanVien->cdv_ngaysinh = $request->cdv_ngaysinh;
            $CongDoanVien->cdv_gioitinh = $request->cdv_gioitinh;
            $CongDoanVien->cdv_cmnd = $request->cdv_cmnd;
            $CongDoanVien->cdv_nguyenquan = $request->cdv_nguyenquan;
            $CongDoanVien->cdv_diachi = $request->cdv_diachi;
            $CongDoanVien->cdv_sdt = $request->cdv_sdt;
            $CongDoanVien->cdv_email = $request->cdv_email;
            $CongDoanVien->cdv_dantoc = $request->cdv_dantoc;
            $CongDoanVien->cdv_trinhdo = $request->cdv_trinhdo;
            $CongDoanVien->cdv_tongiao = $request->cdv_tongiao;
            $CongDoanVien->cdv_ngayvaocd = $request->cdv_ngayvaocd;
            $CongDoanVien->cdv_ngayvaonganh = $request->cdv_ngayvaonganh;
            $CongDoanVien->cdv_trangthai = 1;
            if($request->hasFile('cdv_hinhanh')){
                $file = $request->file('cdv_hinhanh');
                $duoi = $file->getClientOriginalExtension();
    
                if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                    Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                    return redirect()->route('CDV_Them');
                }
    
                $name = $file->getClientOriginalName();
                $file->move("upload/cdv",$name);
                $CongDoanVien->cdv_hinhanh = $name;
    
            }else{
                $CongDoanVien->cdv_hinhanh=""; 
            }
            $CongDoanVien->save();
            $TaiKhoan->tk_tendangnhap = $request->tk_tendangnhap;
            $TaiKhoan->cdv_id = $CongDoanVien->cdv_id;
            $TaiKhoan->tk_matkhau =bcrypt($request->tk_matkhau);
            $TaiKhoan->tk_quyen = $request->tk_quyen;
            $TaiKhoan->tk_trangthai = 1;
            $TaiKhoan->save();

            Session::flash('alert-info', 'Cập Nhật thành công!!!');
            return redirect()->route('CDV_Sua');  
    }
    
    public function postTimkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $cv_id = $request->cv_id;
        $lnv_id = $request->lnv_id;
        //dd($ChucVu);
        if((!empty($tukhoa)) && (!empty($cv_id)) && (!empty($lnv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['cv_id','=',$cv_id],['cdv_ten','like',"%$tukhoa%"],])->get();
        }
        else if ((empty($tukhoa)) && (empty($lnv_id)) && (!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where('cv_id',$cv_id)->get();
        }
        else if ((empty($tukhoa)) && (!empty($lnv_id)) && (empty($cv_id))){
            $CongDoanVien = CongDoanVien::where('lnv_id',$lnv_id)->get();
        }
        else if ((!empty($lnv_id)) && (!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['cv_id','=',$cv_id],])->get();
        }
        else if ((!empty($tukhoa)) && (!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where('lnv_id',$lnv_id)->get();
        }
        else {
            $CongDoanVien = CongDoanVien::where('cdv_ten','like',"%$tukhoa%")->get();
        }
        //dd($CongDoanVien);
        return view('admin.CongDoanVien.timkiem')->with('CongDoanVien',$CongDoanVien)->with('lnv_id',$lnv_id)->with('cv_id',$cv_id)->with('tukhoa',$tukhoa);
    }

}
