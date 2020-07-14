<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Tour;
use App\LichTrinh;
use App\Validate;

class TourController extends Controller
{

    function __construct(){
		$LichTrinh = LichTrinh::all();

    	view()->share('LichTrinh',$LichTrinh);

	}

//Hiển thị danh sách
    public function getDanhSach(){
        $Tour = Tour::all();
        return view('admin.Tour.danhsach')->with('Tour',$Tour);
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
            'tour_phuongtien' => 'required',
            'tour_diaiem' => 'required | min:5',
            'tour_trongnam' => 'required',

        ]
        ,
        [
            'lt_id.required' => 'Bạn chưa nhập lịch trình!',
            'tour_handk.required' => 'Bạn chưa nhập hạn đăng ký!',
            'tour_ngaybd.required' => 'Bạn chưa nhập ngày bắt đầu!',
            'tour_ngaykt.required' => 'Bạn chưa nhập ngày kết thúc!',
            'tour_chiphi.required' => 'Bạn chưa nhập chi phí!',
            'tour_soluong.required' => 'Bạn chưa nhập số lượng!',
            'tour_phuongtien.required' => 'Bạn chưa nhập phương tiện!',
            'tour_diaiem.required' => 'Bạn chưa nhập địa điểm!',
            'tour_trongnam.required' => 'Bạn chưa nhập năm!',

        ])->validate();

        $tour = new Tour();
        $tour->lt_id = $request->lt_id;
        $tour->tour_handk = $request->tour_handk;
        $tour->tour_ngaybd = $request->tour_ngaybd;
        $tour->tour_ngaykt = $request->tour_ngaykt;
        $tour->tour_chiphi = $request->tour_chiphi;
        $tour->tour_soluong = $request->tour_soluong;
        $tour->tour_phuongtien = $request->tour_phuongtien;
        $tour->tour_diadiem = $request->tour_diadiem;
        $tour->tour_trongnam = $request->tour_trongnam;
        $tour->tour_trangthai = 1;
        $tour->save();

        return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $Tour = Tour::find($id);
        //dd($Tour);
        return view('admin.Tour.sua',compact('Tour'));
   }

// Sửa

    public function postSua(Request $request,$id){
        $Tour = Tour::find($id);
        //Bắt các điều kiện nhập vào
        Validator::make($request->$id,
        [
            'lt_id' => 'required',
            'tour_handk' => 'required',
            'tour_ngaybd' => 'required',
            'tour_ngaykt' => 'required',
            'tour_chiphi' => 'required | numeric',
            'tour_soluong' => 'required | numeric',
            'tour_phuongtien' => 'required',
            'tour_diaiem' => 'required | min:5',
            'tour_trongnam' => 'required',

        ]
        ,
        [
            'lt_id.required' => 'Bạn chưa nhập lịch trình!',
            'tour_handk.required' => 'Bạn chưa nhập hạn đăng ký!',
            'tour_ngaybd.required' => 'Bạn chưa nhập ngày bắt đầu!',
            'tour_ngaykt.required' => 'Bạn chưa nhập ngày kết thúc!',
            'tour_chiphi.required' => 'Bạn chưa nhập chi phí!',
            'tour_soluong.required' => 'Bạn chưa nhập số lượng!',
            'tour_phuongtien.required' => 'Bạn chưa nhập phương tiện!',
            'tour_diaiem.required' => 'Bạn chưa nhập địa điểm!',
            'tour_trongnam.required' => 'Bạn chưa nhập năm!',

        ])->validate();


        $tour->lt_id = $request->lt_id;
        $tour->tour_handk = $request->tour_handk;
        $tour->tour_ngaybd = $request->tour_ngaybd;
        $tour->tour_ngaykt = $request->tour_ngaykt;
        $tour->tour_chiphi = $request->tour_chiphi;
        $tour->tour_soluong = $request->tour_soluong;
        $tour->tour_phuongtien = $request->tour_phuongtien;
        $tour->tour_diadiem = $request->tour_diadiem;
        $tour->tour_trongnam = $request->tour_trongnam;
        $tour->tour_trangthai = 1;
        $tour->save();

        return view('admin.Tour.sua');
    }


    public function getXoa(){
        $Tour = Tour::all();
        return view('admin.Tour.xoa')->with('Tour',$Tour);
    }
}
