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
use Image;
use Response;
use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CongDoanVienExport;
// use App\Imports\CDVImport;
use App\Imports\CongDoanVienImport;




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
                $dataTime = date('Ymd_His');
                $file = $request->file('cdv_hinhanh');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                    Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                    return redirect()->route('CDV_Them');
                }
                $fileName = $dataTime . '-' . $file->getClientOriginalName();
                //resize ảnh
                $destinationPath = public_path('upload/cdv');
                $resize_image = Image::make($file->getRealPath());
                $resize_image->resize(300, 300, function($constraint)
                {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $fileName);
                //
                $CongDoanVien->cdv_hinhanh = $fileName;
            }else{
                $CongDoanVien->cdv_hinhanh="";
            }

            $CongDoanVien->cdv_username = $request->cdv_username;
            $CongDoanVien->password =bcrypt($request->password);
            $CongDoanVien->cdv_quyen = $request->cdv_quyen;
            $CongDoanVien->save();
            Session::flash('alert-info', 'Thêm thành công!!!');
            return redirect()->route('CDV_DanhSach');

    }

    public function getSua($id){
        $CongDoanVien =  CongDoanVien::find($id);
        return view('admin.CongDoanVien.sua')->with('CongDoanVien',$CongDoanVien);
    }

    public function postSua(Request $request, $id){

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
            $dataTime = date('Ymd_His');
            $file = $request->file('cdv_hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                return redirect()->route('CDV_Them');
            }
            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            //resize ảnh
            $destinationPath = public_path('upload/cdv');
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(300, 300, function($constraint)
            {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);
            //
            $CongDoanVien->cdv_hinhanh = $fileName;
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

        Session::flash('alert-info', 'Cập Nhật thành công!!!');
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

        return redirect()->route('CDV_DanhSach');
    }

    public function Export(){
        $dataTime = date('Ymd_His');
        $name = $dataTime. '-' . 'DSCDV.xlsx';
        return Excel::download(new CongDoanVienExport, $name);
    }

    public function getImport(){
        return view('admin.CongDoanVien.imp');
    }

    public function Import(Request $request){

        $this->validate($request, [

            'file'=>'required|mimes:xlsx,xls,xlsm',

            ],[
                'file.required'=>'Vui lòng không được thêm trống',
                'file.mimes'=>'Tập tin không đúng định dạng',
            ]);


            try {
                $file = $request->file;

                Excel::import(new CongDoanVienImport, $file);
                Session::flash('alert-info', 'Import thành công!!!');
                return redirect()->route('CDV_DanhSach');
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $f  = $e->failures();
                return view('admin.CongDoanVien.imp',compact('f'));
            }


        }


}
