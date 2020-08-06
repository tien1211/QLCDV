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
        $Tour->gd_id = $request->gd_id;
        $Tour->tour_ngaykt = $request->tour_ngaykt;
        $Tour->tour_chiphi = $request->tour_chiphi;
        $Tour->tour_soluong = $request->tour_soluong;
        $Tour->tour_daily = $request->tour_daily;

        if ($request->hasFile('tour_hinhanh')){

        $file = $request->file('tour_hinhanh');
        $name = $file->getClientOriginalName();
        $file->move('upload/tour/', $name);

    }
        $Tour->tour_hinhanh = $name;
       $Tour->tour_trangthai = 1;
         $Tour->save();
        return \response(['mess'=>'Da them thanh cong!']);

}
    //}
   // if ($request->ajax()) {

            // Validator::make($request->all(),
            // [
            //     'lt_id' => 'required',
            //     'tour_handk' => 'required',
            //     'tour_ngaybd' => 'required',
            //     'tour_ngaykt' => 'required',
            //     'tour_chiphi' => 'required | numeric',
            //     'tour_soluong' => 'required | numeric',
            //     'gd_id' => 'required',
            //     'tour_daily' => 'required',
            //     'tour_hinhanh' =>   'required',


            // ]
            // ,
            // [
            //     'lt_id.required' => 'Bạn chưa nhập lịch trình!',
            //     'tour_handk.required' => 'Bạn chưa nhập hạn đăng ký!',
            //     'tour_ngaybd.required' => 'Bạn chưa nhập ngày bắt đầu!',
            //     'tour_ngaykt.required' => 'Bạn chưa nhập ngày kết thúc!',
            //     'tour_chiphi.required' => 'Bạn chưa nhập chi phí!',
            //     'tour_soluong.required' => 'Bạn chưa nhập số lượng!',
            //     'gd_id.required' => 'Bạn chưa nhập giai đoạn!',
            //     'tour_daily.required' => 'Bạn chưa nhập địa điểm!',
            //     'tour_hinhanh.required' => 'Bạn chưa chọn hình ảnh!',

            // ])->validate();
            //   $Tour = new Tour();
            // $Tour->lt_id = $request->lt_id;


            //  return \response(['lt_id.required'=>'Bạn chưa nhập lịch trình!',

            //  ]);
          //}






        // Bắt các điều kiện nhập vào


        // $Tour = new Tour();
        // $Tour->lt_id = $request->lt_id;
        // $Tour->tour_handk = $request->tour_handk;
        // $Tour->tour_ngaybd = $request->tour_ngaybd;
        // $Tour->tour_ngaykt = $request->tour_ngaykt;
        // $Tour->tour_chiphi = $request->tour_chiphi;
        // $Tour->tour_soluong = $request->tour_soluong;
        // $Tour->gd_id = $request->gd_id;
        // $Tour->tour_daily = $request->tour_daily;
        // $Tour->tour_hinhanh = $request->tour_hinhanh;
        // $file = $request->tour_hinhanh;

      //  return $file;

        // if($request->hasFile('tour_hinhanh')){

        //     $file = $request->file('tour_hinhanh');
        //     $duoi = $file->getClientOriginalExtension();

        //     if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
        //         // Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
        //         return \response(['thongbao'=>'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!'  ]);
        //     }

        //      $name = $file->getClientOriginalName();

        // //     //return $name;

        //      $file->move('upload/tour/',$name);

        //     //  return response()->json([
        //     //     'message' => 'Image upload successfully',
        //     //     'uploaded_image' => '<img src="/upload/tour/'.$name.'/>',
        //     //    ]);


        //     // $Tour->tour_hinhanh = $name;


        // }else{
        //     $Tour->tour_hinhanh="";
        // }
        //return  $Tour->tour_hinhanh;
        // $Tour->tour_trangthai = 1;
        // $Tour->save();

        //  return \response(['thongbao'=>'Thêm thành công'  ]);
        // }


    public function getSua($id){
        $Tour = Tour::find($id);
        //dd($Tour);
        return view('admin.Tour.sua')->with('Tour',$Tour);
    }

// Sửa

    public function postSua(Request $request, $id){

        //Bắt các điều kiện nhập vào
        // $this->validate($request,
        // [
        //     'lt_id' => 'required',
        //     'tour_handk' => 'required',
        //     'tour_ngaybd' => 'required',
        //     'tour_ngaykt' => 'required',
        //     'tour_chiphi' => 'required | numeric',
        //     'tour_soluong' => 'required | numeric',
        //     'gd_id' => 'required',
        //     'tour_daily' => 'required',
        //     'tour_hinhanh' =>   'required',
        // ]
        // ,
        // [
        //     'lt_id.required' => 'Bạn chưa nhập lịch trình!',
        //     'tour_handk.required' => 'Bạn chưa nhập hạn đăng ký!',
        //     'tour_ngaybd.required' => 'Bạn chưa nhập ngày bắt đầu!',
        //     'tour_ngaykt.required' => 'Bạn chưa nhập ngày kết thúc!',
        //     'tour_chiphi.required' => 'Bạn chưa nhập chi phí!',
        //     'tour_soluong.required' => 'Bạn chưa nhập số lượng!',
        //     'gd_id.required' => 'Bạn chưa nhập giai đoạn!',
        //     'tour_daily.required' => 'Bạn chưa nhập địa điểm!',
        //     'tour_hinhanh.required' => 'Bạn chưa chọn hình ảnh!',
        // ]);

        $Tour = Tour::find($id);
        $Tour->lt_id = $request->lt_id;
        $Tour->tour_handk = $request->tour_handk;
        $Tour->tour_ngaybd = $request->tour_ngaybd;
        $Tour->tour_ngaykt = $request->tour_ngaykt;
        $Tour->tour_chiphi = $request->tour_chiphi;
        $Tour->tour_soluong = $request->tour_soluong;
        $Tour->gd_id = $request->gd_id;
        $Tour->tour_daily = $request->tour_daily;


        if ($request->hasFile('tour_hinhanh')){

            $file = $request->file('tour_hinhanh');
            $name = $file->getClientOriginalName();
            $file->move('upload/tour/', $name);
            $Tour->tour_hinhanh = $name;
        }

        else{
            $Tour->tour_hinhanh= $Tour->tour_hinhanh;
        }
        $Tour->tour_trangthai = 1;
        $Tour->save();
        // Session::put('message','Sửa thành công!!!');
               // Session::flash('alert-info', 'Sửa thành công!!!');
       // return redirect()->route('TOUR_DS');
        // return view('TOUR_DS',compact('Tour'));
        return \response(['thongbao'=>'Sửa thành công'  ]);

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
        $cdv_dk = DB::table('dk_tour')
            ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->join('tinhtrangthuphi','tinhtrangthuphi.tttp_id','=','dk_tour.tttp_id')
            ->where('dk_tour.tour_id',$id)
            ->orderBy('dk_tour.dkt_id','desc')
            ->get();
        //dd($cdv_dk);
        return view('admin.Tour.chitiet')->with('chitietTour',$chitietTour)->with('cdv_dk',$cdv_dk);
    }

    public function getThuPhi($id){
        $cdv_dk = DB::table('dk_tour')
            ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->join('tinhtrangthuphi','tinhtrangthuphi.tttp_id','=','dk_tour.tttp_id')
            ->where('dk_tour.tour_id',$id)
            ->get();
        //dd($cdv_dk);
        return view('admin.Tour.thuphi')->with('cdv_dk',$cdv_dk)->with('tour_id',$id);
    }

    public function postThuPhi(Request $request ,$id){
        $cdv_dk = DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',$request->cdv_id],])
            ->update(['tttp_id'=> $request->tttp_id]);
        //dd($cdv_dk);
        return redirect()->back();
    }

}
