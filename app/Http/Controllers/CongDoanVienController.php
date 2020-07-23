<?php

namespace App\Http\Controllers;
use App\CongDoanVien;
use Illuminate\Http\Request;
use App\ChucVu;
use App\LoaiNhanVien;
use App\DonVi;
use Validator;
use Session;
use DB;
class CongDoanVienController extends Controller
{

    function __construct(){
		$ChucVu = ChucVu::all();
        $LoaiNhanVien = LoaiNhanVien::all();
        $DonVi = DonVi::where('dv_trangthai',1)->get();;
        $lnv_id = "";
        $cv_id = "";
        $dv_id = "";
    	view()->share('ChucVu',$ChucVu);
        view()->share('LoaiNhanVien',$LoaiNhanVien);
        view()->share('DonVi',$DonVi);
        view()->share('lnv_id',$lnv_id);
        view()->share('cv_id',$cv_id);
        view()->share('dv_id',$dv_id);
	}

    public function getDanhSach(){
        $CongDoanVien = CongDoanVien::paginate(5);
        return view('admin.CongDoanVien.danhsach')->with('CongDoanVien',$CongDoanVien);
        
    }

    public function getThem(){
        return view('admin.CongDoanVien.them');
    }

    public function postThem(Request $request){
        $this->validate($request, [
            'cv_id' => 'required',
            'lnv_id' => 'required',
            'dv_id'=>'required',
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
            'cdv_ngaythuviec'=>'required',
            'cdv_ngayvaonganh'=>'required',
            'cdv_username'=>'bail|required|unique:CongDoanVien',
            'password'=>'required|min:8|max:50',
            'confirm_password'=>'required|same:password',
            'cdv_quyen' => 'required'
            ],[
                'cv_id.required' => 'Vui lòng không được để trống chức vụ',
                'lnv_id.required' => 'Vui lòng không được để trống loại nhân viên',
                'dv_id.required'=>'Vui lòng không được để trống đơn vị',
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
                'cdv_ngaythuviec.required'=>'Vui lòng không được để trống ngày vào công đoàn',
                'cdv_ngayvaonganh.required'=>'Vui lòng không được để trống ngày vào ngành',
                'cdv_username.required'=>'Vui lòng không được để trống tên đăng nhập',
                'cdv_username.unique'=>'Tên đăng nhập đã tồn tại',
                'password.required'=>'Vui lòng không được để trống mật khẩu',
                'password.min'=>'Mật khẩu phải ít nhất 8 kí tự',
                'password.max' => 'Mật khẩu không được quá 50 kí tự',
                'confirm_password.required'=>'Vui lòng không được để trống xác nhận mật khẩu',
                'confirm_password.same' => 'Mật khẩu không trùng khớp',
                'cdv_quyen.required' => 'Vui lòng chọn quyền cho công đoàn viên'
            ]);
            $CongDoanVien = new CongDoanVien();
            $CongDoanVien->dv_id = $request->dv_id;
            $CongDoanVien->cv_id = $request->cv_id;
            $CongDoanVien->lnv_id = $request->lnv_id;
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
            $CongDoanVien->cdv_ngaythuviec = $request->cdv_ngaythuviec;
            $CongDoanVien->cdv_ngayvaonganh = $request->cdv_ngayvaonganh;
            $CongDoanVien->cdv_trangthai = 1;
            $CongDoanVien->mht_id = 1;
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
            
            $CongDoanVien->cdv_username = $request->cdv_username;
            $CongDoanVien->password =bcrypt($request->password);
            $CongDoanVien->cdv_quyen = $request->cdv_quyen;
            $CongDoanVien->save();

            Session::flash('alert-info', 'Thêm thành công!!!');
            return redirect()->route('CDV_Them');    
    }

    public function getSua($id){
        
        $CongDoanVien =  CongDoanVien::find($id);
        
        return view('admin.CongDoanVien.sua')->with('CongDoanVien',$CongDoanVien);
        
    }

    public function postSua(Request $request, $id){
        $this->validate($request, [
            'cv_id' => 'required',
            'lnv_id' => 'required',
            'dv_id'=>'required',
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
            'cdv_ngaythuviec'=>'required',
            'cdv_ngayvaonganh'=>'required',
            'cdv_quyen' => 'required'
            ],[
                'cv_id.required' => 'Vui lòng không được để trống chức vụ',
                'lnv_id.required' => 'Vui lòng không được để trống loại nhân viên',
                'dv_id.required'=>'Vui lòng không được để trống đơn vị',
                'cdv_ten.required'=>'Vui lòng không được để trống tên công đoàn viên',
                'cdv_ngaysinh.required'=>'Vui lòng không được để trống ngày sinh',
                'cdv_gioitinh.required'=>'Vui lòng không được để trống giới tính',
                'cdv_cmnd.required' => 'Vui lòng không được để trống CMND',
                'cdv_cmnd.min' => 'CMND phải ít nhất 10 kí tự',
                'cdv_cmnd.max' => 'CMND phải không quá 10 kí tự',
                'cdv_nguyenquan.required'=>'Vui lòng không được để trống nguyên quán',
                'cdv_diachi.required'=>'Vui lòng không được để trống địa chỉ',
                'cdv_sdt.required'=>'Vui lòng không được để trống số điện thoại',
                'cdv_sdt.min' => 'Số điện thoại phải ít nhất 10 kí tự',
                'cdv_sdt.max' => 'Số điện thoại phải không quá 10 kí tự',
                'cdv_email.required'=>'Vui lòng không được để trống email',
                'cdv_dantoc.required'=>'Vui lòng không được để trống dân tộc',
                'cdv_trinhdo.required'=>'Vui lòng không được để trống trình độ',
                'cdv_tongiao.required'=>'Vui lòng không được để trống tôn giáo',
                'cdv_ngaythuviec.required'=>'Vui lòng không được để trống ngày vào công đoàn',
                'cdv_ngayvaonganh.required'=>'Vui lòng không được để trống ngày vào ngành',
                'cdv_quyen.required' => 'Vui lòng chọn quyền cho công đoàn viên'
            ]);

            $CongDoanVien = CongDoanVien::find($id);
            $CongDoanVien->dv_id = $request->dv_id;
            $CongDoanVien->cv_id = $request->cv_id;
            $CongDoanVien->lnv_id = $request->lnv_id;
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
            $CongDoanVien->cdv_ngaythuviec = $request->cdv_ngaythuviec;
            $CongDoanVien->cdv_ngayvaonganh = $request->cdv_ngayvaonganh;
            $CongDoanVien->cdv_trangthai = 1;
            $CongDoanVien->mht_id = $CongDoanVien->mht_id;
            if($request->hasFile('cdv_hinhanh')){
                $file = $request->file('cdv_hinhanh');
                $duoi = $file->getClientOriginalExtension();
    
                if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                    Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                    return redirect()->route('CDV_Sua');
                }
    
                $name = $file->getClientOriginalName();
                $file->move("upload/cdv",$name);
                $CongDoanVien->cdv_hinhanh = $name;
    
            }else{
                $CongDoanVien->cdv_hinhanh= $CongDoanVien->cdv_hinhanh; 
            }
            
            
            $CongDoanVien->cdv_quyen = $request->cdv_quyen;
            if($request->changepassword == "on"){
                $this->validate($request, [
                    
                    'password'=>'required|min:8|max:50',
                    'confirm_password'=>'required|same:password',
                    ],[
                        
                        'password.required'=>'Vui lòng không được để trống mật khẩu',
                        'password.min'=>'Mật khẩu phải ít nhất 8 kí tự',
                        'password.max' => 'Mật khẩu không được quá 50 kí tự',
                        'confirm_password.required'=>'Vui lòng không được để trống xác nhận mật khẩu',
                        'confirm_password.same' => 'Mật khẩu không trùng khớp',
                        
                    ]);
                $CongDoanVien->password =bcrypt($request->password);
            }
            
            $CongDoanVien->save();

            Session::flash('alert-info', 'Cập nhật thành công!!!');
            return redirect()->route('CDV_DanhSach');
    }

    public function getXoa($id){
        $CongDoanVien = CongDoanVien::find($id);
        $CongDoanVien->cdv_trangthai = 0;
        $CongDoanVien->save();
        Session::flash('alert-info', 'Xóa thành công!!!');
            return redirect()->route('CDV_DanhSach');
    }
    
    public function getchitietCDV($id){
        $CongDoanVien = CongDoanVien::find($id);
        return view('admin.CongDoanVien.chitiet')->with('CongDoanVien',$CongDoanVien);
    }
    
    public function postTimkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $cv_id = $request->cv_id;
        $lnv_id = $request->lnv_id;
        $dv_id = $request->dv_id;
        //dd($ChucVu);
        // nhập đầy đủ
        if((!empty($tukhoa)) && (!empty($cv_id)) && (!empty($lnv_id)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['cv_id','=',$cv_id],['dv_id','=',$dv_id],['cdv_ten','like',"%$tukhoa%"],])->paginate(5);
        }
        // không nhập từ khóa
        else if ((!empty($lnv_id)) && (!empty($cv_id)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id',$lnv_id],['cv_id','=',$cv_id],['dv_id','=',$dv_id]])->paginate(5);
        }
        // không chọn loại nhân viên
        else if ((!empty($tukhoa)) && (!empty($cv_id)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['cv_id','=',$cv_id],['dv_id','=',$dv_id],['cdv_ten','like',"%$tukhoa%"]])->paginate(5);
        }
        // không chọn chức vụ
        else if ((!empty($tukhoa)) && (!empty($lnv_id)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['dv_id','=',$dv_id],['cdv_ten','like',"%$tukhoa%"],])->paginate(5);
        }
        // không chọn đơn vị
        else if ((!empty($tukhoa)) && (!empty($lnv_id)) && (!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['cv_id','=',$cv_id],['cdv_ten','like',"%$tukhoa%"],])->paginate(5);
        }
        // Chọn đơn vị và chức vụ
        else if ((!empty($cv_id)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['cv_id','=',$cv_id],['dv_id','=',$dv_id],])->paginate(5);
        }
        // Chọn đơn vị và loại nhân viên
        else if ((!empty($lnv_id)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['dv_id','=',$dv_id],])->paginate(5);
        }
        // Chọn đơn vị và nhân tên cdv
        else if ((!empty($tukhoa)) && (!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where([['dv_id','=',$dv_id],['cdv_ten','like',"%$tukhoa%"],])->paginate(5);
        }
        // Chọn chức vụ và loại nhân viên
        else if ((!empty($lnv_id)) && (!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['cv_id','=',$cv_id],])->paginate(5);
        }
        // Chọn chức vụ và nhập tên cdv
        else if ((!empty($tukhoa)) && (!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where([['cv_id','=',$cv_id],['cdv_ten','like',"%$tukhoa%"],])->paginate(5);
        }
        // Chọn loại nhân viên và nhập tên cdv
        else if ((!empty($tukhoa)) && (!empty($lnv_id))){
            $CongDoanVien = CongDoanVien::where([['lnv_id','=',$lnv_id],['cdv_ten','like',"%$tukhoa%"],])->paginate(5);
        }
        // Chọn đơn vị
        else if ((!empty($dv_id))){
            $CongDoanVien = CongDoanVien::where('dv_id','=',$dv_id)->paginate(5);
        }
        // Chọn chức vụ
        else if ((!empty($cv_id))){
            $CongDoanVien = CongDoanVien::where('cv_id','=',$cv_id)->paginate(5);
        }
        // Chọn loại nhân viên
        else if ((!empty($lnv_id))){
            $CongDoanVien = CongDoanVien::where('lnv_id','=',$lnv_id)->paginate(5);
        }
        // nhập tên cdv
        else {
            $CongDoanVien = CongDoanVien::where('cdv_ten','like',"%$tukhoa%")->paginate(5);
        }
        //dd($dv_id);
        //dd($CongDoanVien);
        return view('admin.CongDoanVien.danhsach')->with('CongDoanVien',$CongDoanVien)->with('lnv_id',$lnv_id)->with('cv_id',$cv_id)->with('tukhoa',$tukhoa)->with('dv_id',$dv_id);
    }

    public function getDSDV($id){
        $CongDoanVien = CongDoanVien::where('dv_id',$id)->paginate(5);
        $dv_id = $id;
        //dd($CongDoanVien);
        return view('admin.CongDoanVien.danhsach')->with('CongDoanVien',$CongDoanVien)->with('dv_id',$dv_id);
    }

    public function updateCDV(){
        DB::table('CongDoanVien')->whereRaw('YEAR(NOW()) - YEAR(cdv_ngayvaonganh) < 1')->update(['mht_id' => 1]);
        DB::table('CongDoanVien')->whereRaw('YEAR(NOW()) - YEAR(cdv_ngayvaonganh) > 1 and YEAR(NOW()) - YEAR(cdv_ngayvaonganh) < 3')->update(['mht_id' => 2]);
        DB::table('CongDoanVien')->whereRaw('YEAR(NOW()) - YEAR(cdv_ngayvaonganh) > 3 and YEAR(NOW()) - YEAR(cdv_ngayvaonganh) < 5')->update(['mht_id' => 3]);
        DB::table('CongDoanVien')->whereRaw('YEAR(NOW()) - YEAR(cdv_ngayvaonganh) > 5')->update(['mht_id' => 4]);
        //dd($CongDoanVien);
        return redirect()->route('CDV_DanhSach');
    }
}
