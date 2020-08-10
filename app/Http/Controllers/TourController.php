<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tour;
use App\LichTrinh;
use App\GiaiDoan;
use App\TinhTrangThuPhi;
use Validate;
use Session;
use DB;




class TourController extends Controller
{

    function __construct(){
        $LichTrinh = LichTrinh::all();
        $GiaiDoan = GiaiDoan::all();
        $TinhTrangThuPhi = DB::table('tinhtrangthuphi')->get();
        $ngaybd = "";
        $ngaykt = "";
        $gd_id = "";
        $lt_id = "";
        view()->share('LichTrinh',$LichTrinh);
        view()->share('GiaiDoan', $GiaiDoan);
        view()->share('TinhTrangThuPhi',$TinhTrangThuPhi);
        view()->share('ngaybd',$ngaybd);
        view()->share('ngaykt',$ngaykt);
        view()->share('gd_id',$gd_id);
        view()->share('lt_id',$lt_id);
	}

//Hiển thị danh sách
    public function getDanhSach(){
        $ngaybd = "";
        $ngaykt = "";
        $Tour = Tour::all();
        return view('admin.Tour.danhsach')->with('Tour',$Tour);
    }

// Thêm

    public function getThem(){

        $LichTrinh = LichTrinh::all();
        return view('admin.Tour.them')->with('LichTrinh',$LichTrinh);
    }

    public function postThem(Request $request){

            $Tour = new Tour();
            $Tour->lt_id = $request->lt_id;
            $Tour->tour_handk = $request->tour_handk;
            $Tour->tour_ngaybd = $request->tour_ngaybd;
            $Tour->tour_ngaykt = $request->tour_ngaykt;
            $Tour->tour_chiphi = $request->tour_chiphi;
            $Tour->tour_soluong = $request->tour_soluong;
            $Tour->gd_id = $request->gd_id;
            $Tour->tour_daily = $request->tour_daily;
            $Tour->tour_hinhanh = $request->tour_hinhanh;
            $file = $request->tour_hinhanh;

            if($request->hasFile('tour_hinhanh')){

                $file = $request->file('tour_hinhanh');
                $duoi = $file->getClientOriginalExtension();

                if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                    Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');

                }

                $name = $file->getClientOriginalName();
                $file->move('upload/tour/',$name);

            }else{
                $Tour->tour_hinhanh="";
            }
            $Tour->tour_trangthai = 1;
            $Tour->save();
            Session::put('message','Thêm thành công!!!');
            // Session::flash('alert-info', 'Thêm thành công!!!');
            return Redirect()->route('TOUR_DanhSach');
}



    public function getSua($id){
        $Tour = Tour::find($id);
        return view('admin.Tour.sua')->with('Tour',$Tour);
    }

// Sửa

    public function postSua(Request $request, $id){
        $Tour = Tour::find($id);
        $Tour->lt_id = $request->lt_id;
        $Tour->tour_handk = $request->tour_handk;
        $Tour->tour_ngaybd = $request->tour_ngaybd;
        $Tour->tour_ngaykt = $request->tour_ngaykt;
        $Tour->tour_chiphi = $request->tour_chiphi;
        $Tour->tour_soluong = $request->tour_soluong;
        $Tour->gd_id = $request->gd_id;
        $Tour->tour_daily = $request->tour_daily;

        if($request->hasFile('tour_hinhanh')){
            $file = $request->file('tour_hinhanh');
            $duoi = $file->getClientOriginalExtension();

            if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                return redirect()->back();
            }

            $name = $file->getClientOriginalName();
            $file->move("upload/tour",$name);
            $Tour->tour_hinhanh = $name;

        }else{
            $Tour->tour_hinhanh= $Tour->tour_hinhanh;
        }
        $Tour->tour_trangthai = 1;
        $Tour->save();
        Session::put('message','Sửa thành công!!!');
         //Session::flash('alert-info', 'Sửa thành công!!!');
        return redirect()->back();
    }

    public function getXoa($id){
        $Tour = Tour::find($id);
        $Tour->tour_trangthai = 0;
        $Tour->save();
        Session::flash('alert-info', 'Xóa thành công!!!');
        return Redirect::back();
    }


    // public function getDat($id){
    //     $Tour = Tour::find($id);

    //    return view('',compact('Tour'));
    // }

    // public function postDat(){
    //     $Tour = Tour::find($id);
    //     $Tour->DK_Tour->dkt_id = $request->dkt_id;
    //     $Tour->CongDoanVien->cdv_id = $request->cdv_id;
    //     $Tour->save();
    //     Session::put('message','Đăng ký tour thành công!!!');
    //     return redirect()->route('TOUR_DanhSach');
    // }

    public function postTimkiem(Request $request){
        $gd_id = $request->gd_id;
        $ngaybd = $request->tour_ngaybd;
        $ngaykt = $request->tour_ngaykt;
        $lt_id = $request->lt_id;
        //dd($ngaybd);
        if((!empty($gd_id)) && (!empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_ngaybd','>',$ngaybd],['tour_ngaykt','<=',$ngaykt],])->get();
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_ngaybd','>',$ngaybd],['tour_ngaykt','<=',$ngaykt],])->get();
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_ngaykt','<=',$ngaykt],])->get();
        }
        else if((!empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_ngaybd','>',$ngaybd],])->get();
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],])->get();
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_ngaybd','>',$ngaybd],])->get();
        }
        else if((empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_ngaykt','<=',$ngaykt],])->get();
        }
        else if((empty($gd_id)) && (empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where('lt_id','=',$lt_id)->get();
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (!empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['tour_ngaybd','>=',$ngaybd],['tour_ngaykt','<=',$ngaykt],])->get();
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (empty($lt_id))){
                $Tour = Tour::where([['gd_id','=', $gd_id],['tour_ngaykt','<=',$ngaykt],])->get();
        }
        else if((!empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['gd_id','=', $gd_id],['tour_ngaybd','>',$ngaybd],])->get();
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where('gd_id','=', $gd_id)->get();
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where('tour_ngaybd','>',$ngaybd)->get();
        }
        else if((empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where('tour_ngaykt','<=',$ngaykt)->get();
        }else{
            $Tour = Tour::all();
        }
        return view('admin.Tour.danhsach')->with('Tour', $Tour)->with('ngaybd',$ngaybd)->with('ngaykt',$ngaykt)->with('gd_id',$gd_id)->with('lt_id',$lt_id);
    }

    public function getchitietTour($id){
        $chitietTour = DB::table('Tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
            ->where('tour_id',$id)->first();
        $nguoithamgia = DB::table('thongtinnguoidk')
            ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->join('tinhtrangthuphi','tinhtrangthuphi.tttp_id','=','dk_tour.tttp_id')
            ->where([['dk_tour.tour_id',$id],['congdoanvien.cdv_trangthai','<>',0],])
            ->orderBy('dk_tour.cdv_id','asc')
            ->orderBy('dk_tour.tttp_id','asc')
            ->get();
        $cdv_dk = DB::table('dk_tour')
            ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->where([['dk_tour.tour_id',$id],['congdoanvien.cdv_trangthai','<>',0],['dk_tour.tttp_id','<>',2]])
            ->orderBy('dk_tour.dkt_id','desc')
            ->get();
        return view('admin.Tour.chitiet')->with('chitietTour',$chitietTour)
            ->with('nguoithamgia',$nguoithamgia)
            ->with('cdv_dk',$cdv_dk);
    }

    public function getThuPhi($id){
        $cdv_dk = DB::table('dk_tour')
            ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->join('tinhtrangthuphi','tinhtrangthuphi.tttp_id','=','dk_tour.tttp_id')
            ->where('dk_tour.tour_id',$id)
            ->get();
        return view('admin.Tour.thuphi')->with('cdv_dk',$cdv_dk)->with('tour_id',$id);
    }

    public function postThuPhi(Request $request ,$id){
        $cdv_dk = DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',$request->cdv_id],])
            ->update(['tttp_id'=> $request->tttp_id]);
        return redirect()->back();
    }

}
