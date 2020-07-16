<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tour;
use App\LichTrinh;
use Validate;
use Session;

class TourController extends Controller
{

    function __construct(){
		$LichTrinh = LichTrinh::all();

    	view()->share('LichTrinh',$LichTrinh);

	}

//Hiển thị danh sách
    public function getDanhSach(){
        $ngaybd = "";
        $ngaykt = "";
        $Tour = Tour::all();
        return view('admin.Tour.danhsach')->with('Tour',$Tour)->with('ngaybd',$ngaybd)->with('ngaykt',$ngaykt);
    }

// Thêm

    public function getThem(){

         $LichTrinh = LichTrinh::all();
        return view('admin.Tour.them')->with('LichTrinh',$LichTrinh);
    }

    public function postThem(Request $request){
        //Bắt các điều kiện nhập vào
        Validator::make($request->all(),
        [
            'lt_id' => 'required',
            'tour_handk' => 'required',
            'tour_ngaybd' => 'required',
            'tour_ngaykt' => 'required',
            'tour_chiphi' => 'required | numeric',
            'tour_soluong' => 'required | numeric',
            'tour_giaidoan' => 'required',
            'tour_daily' => 'required',
            'tour_mota' => 'required',

        ]
        ,
        [
            'lt_id.required' => 'Bạn chưa nhập lịch trình!',
            'tour_handk.required' => 'Bạn chưa nhập hạn đăng ký!',
            'tour_ngaybd.required' => 'Bạn chưa nhập ngày bắt đầu!',
            'tour_ngaykt.required' => 'Bạn chưa nhập ngày kết thúc!',
            'tour_chiphi.required' => 'Bạn chưa nhập chi phí!',
            'tour_soluong.required' => 'Bạn chưa nhập số lượng!',
            'tour_giaidoan.required' => 'Bạn chưa nhập phương tiện!',
            'tour_daily.required' => 'Bạn chưa nhập địa điểm!',
            'tour_mota.required' => 'Bạn chưa nhập năm!',

        ])->validate();

        $Tour = new Tour();
        $Tour->lt_id = $request->lt_id;
        $Tour->tour_handk = $request->tour_handk;
        $Tour->tour_ngaybd = $request->tour_ngaybd;
        $Tour->tour_ngaykt = $request->tour_ngaykt;
        $Tour->tour_chiphi = $request->tour_chiphi;
        $Tour->tour_soluong = $request->tour_soluong;
        $Tour->tour_giaidoan = $request->tour_giaidoan;
        $Tour->tour_daily = $request->tour_daily;
        $Tour->tour_mota = $request->tour_mota;
        $Tour->tour_trangthai = 1;
        $Tour->save();

        return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $Tour = Tour::find($id);
        //dd($Tour);
        return view('admin.Tour.sua',compact('Tour'));
   }

// Sửa

    public function postSua(Request $request, $id){

        //Bắt các điều kiện nhập vào
        $this->validate($request,
        [
            'lt_id' => 'required',
            'tour_handk' => 'required',
            'tour_ngaybd' => 'required',
            'tour_ngaykt' => 'required',
            'tour_chiphi' => 'required | numeric',
            'tour_soluong' => 'required | numeric',
            'tour_giaidoan' => 'required',
            'tour_daily' => 'required',
            'tour_mota' => 'required',

        ]
        ,
        [
            'lt_id.required' => 'Bạn chưa nhập lịch trình!',
            'tour_handk.required' => 'Bạn chưa nhập hạn đăng ký!',
            'tour_ngaybd.required' => 'Bạn chưa nhập ngày bắt đầu!',
            'tour_ngaykt.required' => 'Bạn chưa nhập ngày kết thúc!',
            'tour_chiphi.required' => 'Bạn chưa nhập chi phí!',
            'tour_soluong.required' => 'Bạn chưa nhập số lượng!',
            'tour_giaidoan.required' => 'Bạn chưa nhập phương tiện!',
            'tour_daily.required' => 'Bạn chưa nhập địa điểm!',
            'tour_mota.required' => 'Bạn chưa nhập năm!',

        ]);

        $Tour = Tour::find($id);
        $Tour->lt_id = $request->lt_id;
        $Tour->tour_handk = $request->tour_handk;
        $Tour->tour_ngaybd = $request->tour_ngaybd;
        $Tour->tour_ngaykt = $request->tour_ngaykt;
        $Tour->tour_chiphi = $request->tour_chiphi;
        $Tour->tour_soluong = $request->tour_soluong;
        $Tour->tour_giaidoan = $request->tour_giaidoan;
        $Tour->tour_daily = $request->tour_daily;
        $Tour->tour_mota = $request->tour_mota;
        $Tour->tour_trangthai = 1;
        $Tour->save();
        Session::put('message','Sửa thành công!!!');
                // Session::flash('alert-info', 'Sửa thành công!!!');
        return redirect()->route('TOUR_DanhSach');
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
        $tukhoa = $request->tukhoa;
        $ngaybd = $request->tour_ngaybd;
        $ngaykt = $request->tour_ngaykt;
        //dd($ngaybd);
        if((!empty($tukhoa)) && (!empty($ngaybd)) && (!empty($ngaykt))){
            $Tour = Tour::where([['tour_diadiem','like',"%$tukhoa%"],['tour_ngaybd','>=',$ngaybd],['tour_ngaykt','<=',date('Y-m-d',strtotime($ngaykt. ' + 1 days'))],])->get();
        }else if((empty($tukhoa)) && (!empty($ngaybd)) && (!empty($ngaykt))){
            $Tour = Tour::where([['tour_ngaybd','>=',$ngaybd],['tour_ngaykt','<=',date('Y-m-d',strtotime($ngaykt. ' + 1 days'))],])->get();
        }else{
        $Tour = Tour::where('tour_diadiem','like',"%$tukhoa%")->get();
        }
        return view('admin.Tour.danhsach')->with('Tour', $Tour)->with('ngaybd',$ngaybd)->with('ngaykt',$ngaykt);
    }
}
