<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tour;
use App\LichTrinh;
use Validate;
use Session;
use DB;
use Image;
class LichTrinhController extends Controller
{

    function __construct(){
        $Tour = Tour::all();
        view()->share('Tour',$Tour);
    }

    // Hien thi lich trinh
    public function getDanhSach(){
        $LichTrinh = LichTrinh::where('lt_trangthai',1)->get();
        return view('admin.LichTrinh.danhsach',compact('LichTrinh'));
    }

    //Thêm
    public function getThem(){
        $LichTrinh = LichTrinh::all();
        return view('admin.LichTrinh.them')->with('LichTrinh',$LichTrinh);

    }
    public function postThem(Request $request){
        $LichTrinh = new LichTrinh();
        $LichTrinh->lt_ten = $request->lt_ten;
        $LichTrinh->lt_mota= $request->lt_mota;
        if($request->hasFile('lt_file')){
            $dataTime = date('Ymd_His');
            $lt_file = $request->lt_file;
            $duoi = $lt_file->getClientOriginalExtension();
            if($duoi != 'doc' && $duoi != 'docx'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi doc, docx!!!');
                return redirect()->route('LT_Them');
            }
            $fileName = $dataTime . '-' . $lt_file->getClientOriginalName();
            $savePath = public_path('upload/lichtrinh');
            $lt_file->move($savePath,$fileName);
            $LichTrinh->lt_file = $fileName;
            $LichTrinh->lt_trangthai = 1;
            $LichTrinh->save();
            Session::flash('alert-1', 'Thêm thành công!!!');
            return redirect()->route('LT_DanhSach');
        }else{
            Session::flash('alert-danger', 'Bạn chưa chọn file!!!');
            return redirect()->back();
        }

    }

    public function getSua($id){
        $LichTrinh = LichTrinh::find($id);
        return view('admin.LichTrinh.sua',compact('LichTrinh'));
    }
    public function postSua(Request $request,$id){
        $LichTrinh = LichTrinh::find($id);
        $LichTrinh->lt_ten = $request->lt_ten;
        $LichTrinh->lt_mota= $request->lt_mota;
        $LichTrinh->lt_trangthai = 1;
        if($request->hasFile('lt_file')){
            $dataTime = date('Ymd_His');
            $lt_file = $request->lt_file;
            $duoi = $lt_file->getClientOriginalExtension();
            if($duoi != 'doc' && $duoi != 'docx'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi doc, docx!!!');
                return redirect()->route('LT_Sua');
            }
            $fileName = $dataTime . '-' . $lt_file->getClientOriginalName();
            $savePath = public_path('upload/lichtrinh');
            $lt_file->move($savePath,$fileName);
            $LichTrinh->lt_file = $fileName;
            $LichTrinh->save();
            Session::flash('alert-info', 'Sửa thành công!!!');
            return redirect()->route('LT_DanhSach');
        }else{
            $LichTrinh->lt_file = $LichTrinh->lt_file;
            $LichTrinh->save();
            Session::flash('alert-2', 'Sửa thành công!!!');
            return redirect()->route('LT_DanhSach');
        }
    }

    public function getXoa($id){
        $LichTrinh = LichTrinh::find($id);
        $LichTrinh->lt_trangthai = 0;
        $LichTrinh->save();
        Session::flash('alert-3', 'Xóa thành công!!!');
        return Redirect::back();
    }

    public function getTimKiem(Request $request){
        $tukhoa = $request->tukhoa;
        $LichTrinh = LichTrinh::where('lt_ten','like',"%$tukhoa%")->get();
        return view('admin.LichTrinh.danhsach')->with('LichTrinh',$LichTrinh)->with('tukhoa',$tukhoa);
    }

    public function getHinh($id){
        $hinh = DB::table('anh_tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','anh_tour.lt_id')
            ->where([['anh_tour.lt_id',$id],['at_trangthai',1]])->get();
        return view('admin.LichTrinh.danhsachhinh')->with('hinh',$hinh)->with('lt_id',$id);
    }

    public function postHinh(Request $request, $id){
        if($request->hasFile('hinh')){
            $dataTime = date('Ymd_His');
            foreach($request->hinh as $file){
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                return redirect()->back();
            }
            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            //resize ảnh
            $destinationPath = public_path('upload/tour');
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(710, 399, function($constraint)
            {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);
            //
            $data['at_hinhanh'] = $fileName;
            $data['lt_id'] = $id;
            $data['at_trangthai'] = 1;
            DB::table('anh_tour')->insert($data);
        }
            Session::flash('alert-info', 'Thêm thành công!!!');
            return redirect()->back();
        }else{
            Session::flash('alert-warning', 'Chưa chọn file!!!');
            return redirect()->back();
        }
    }

    public function postSuaHinh(Request $request, $id){
        if($request->hasFile('hinh')){
            $dataTime = date('Ymd_His');
            foreach($request->hinh as $file){
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                return redirect()->route('CDV_Them');
            }
            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            //resize ảnh
            $destinationPath = public_path('upload/tour');
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(710, 399, function($constraint)
            {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);
            //
            $data['at_hinhanh'] = $fileName;
            DB::table('anh_tour')->where('at_id',$id)->update(['at_hinhanh'=>$fileName]);
        }
        Session::flash('alert-info', 'Thêm thành công!!!');
            return redirect()->back();
        }else{
            Session::flash('alert-danger', 'Chưa chọn file!!!');
            return redirect()->back();
        }
    }

    public function getXoaHinh(Request $request){
        $at_id = $request->at_id;
        foreach($at_id as $anh){
            DB::table('anh_tour')->where('at_id',$anh)->update(['at_trangthai'=>0]);
        }
        Session::flash('alert-info', 'Xóa Thành Công!!!');
        return Redirect::back();
    }
}
