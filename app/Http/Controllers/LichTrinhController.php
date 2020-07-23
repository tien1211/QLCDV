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
        $LichTrinh = LichTrinh::all();
        return view('admin.LichTrinh.danhsach',compact('LichTrinh'));
    }

    //Thêm
    public function getThem(){
        $LichTrinh = LichTrinh::all();
        return view('admin.LichTrinh.them')->with('LichTrinh',$LichTrinh);

    }
    public function postThem(Request $request){
        Validator::make($request->all(),
        [
            'lt_ten' => 'required',
            'lt_file' => 'required|max:5000',
        ],
        [
            'lt_ten.required' => 'Bạn chưa nhập tên lịch trình!',
            'lt_file.required' => 'Bạn chưa thêm file lịch trình!',
            'lt_file.max' => 'File có dung lượng quá lớn!',
        ])->validate();
        $LichTrinh = new LichTrinh();
        $LichTrinh->lt_ten = $request->lt_ten;
        $LichTrinh->lt_mota= $request->lt_mota;
        if($request->hasFile('lt_file')){
            $dataTime = date('Ymd_His');
            $lt_file = $request->lt_file;
            $duoi = $lt_file->getClientOriginalExtension();
            if($duoi != 'xlsx' && $duoi != 'xls' && $duoi != 'csv'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi xlsx, xls, csv!!!');
                return redirect()->route('LT_Them');
            }
            $fileName = $dataTime . '-' . $lt_file->getClientOriginalName();
            $savePath = public_path('upload/lichtrinh');
            $lt_file->move($savePath,$fileName);
            $LichTrinh->lt_file = $fileName;
            $LichTrinh->lt_trangthai = 1;
            $LichTrinh->save();
            return redirect()->route('LT_DanhSach')->with('thongbao','Thêm thành công');
        }else{
            Session::flash('alert-warning', 'Bạn chưa chọn file');
                return redirect()->route('LT_Them');
        }
        
    }

    public function getSua($id){
        $LichTrinh = LichTrinh::find($id);
        return view('admin.LichTrinh.sua',compact('LichTrinh'));
    }
    public function postSua(Request $request,$id){
        $this->validate($request,
        [
            'lt_ten' => 'required',
            'lt_file' => 'max:5000',
        ],
        [
            'lt_ten.required' => 'Bạn chưa nhập tên lịch trình!',
            'lt_file.max' => 'File có dung lượng quá lớn!',
        ]);
        $LichTrinh = LichTrinh::find($id);
        $LichTrinh->lt_ten = $request->lt_ten;
        $LichTrinh->lt_mota= $request->lt_mota;
        $LichTrinh->lt_trangthai = 1;
        if($request->hasFile('lt_file')){
            $dataTime = date('Ymd_His');
            $lt_file = $request->lt_file;
            $duoi = $lt_file->getClientOriginalExtension();
            if($duoi != 'xlsx' && $duoi != 'xls' && $duoi != 'csv'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi xlsx, xls, csv!!!');
                return redirect()->route('LT_Them');
            }
            $fileName = $dataTime . '-' . $lt_file->getClientOriginalName();
            $savePath = public_path('upload/lichtrinh');
            $lt_file->move($savePath,$fileName);
            $LichTrinh->lt_file = $fileName;
            $LichTrinh->save();
            return redirect()->route('LT_DanhSach')->with('thongbao','Sửa thành công');
        }else{
            $LichTrinh->lt_file = $LichTrinh->lt_file;
            $LichTrinh->save();
            //Session::put('message','Sửa thành công!!!');
            // Session::flash('alert-info', 'Sửa thành công!!!');
            return redirect()->route('LT_DanhSach')->with('thongbao','Sửa thành công');
        }
    }
    public function getXoa($id){
        $LichTrinh = LichTrinh::find($id);
        $LichTrinh->lt_trangthai = 0;
        $LichTrinh->save();
        Session::put('message','Xóa thành công!!!');
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
            ->where('anh_tour.lt_id',$id)->get();
        //dd($hinh);
        return view('admin.LichTrinh.danhsachhinh')->with('hinh',$hinh);
    }

    public function postHinh(Request $request, $id){
        if($request->hasFile('hinh')){
            $dataTime = date('Ymd_His');
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                return redirect()->route('CDV_Them');
            }
            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            //resize ảnh
            $destinationPath = public_path('upload/tour');
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(1200, 780, function($constraint)
            {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);
            //
            $data['at_hinhanh'] = $fileName;
            $data['lt_id'] = $id;
            $data['at_trangthai'] = 1;
            DB::table('anh_tour')->insert($data);
            Session::flash('message', 'Thêm thành công!!!');
            return redirect()->back();
        }else{
            Session::flash('message', 'Chưa chọn file!!!');
            return redirect()->back();
        }
    }
}
