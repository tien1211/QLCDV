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
use Image;




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
                $dataTime = date('Ymd_His');
                $file = $request->file('tour_hinhanh');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                    Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                    return redirect()->route('TOUR_Them');
                }
                $fileName = $dataTime . '-' . $file->getClientOriginalName();
                //resize ảnh
                $destinationPath = public_path('upload/tour');
                $resize_image = Image::make($file->getRealPath());
                $resize_image->resize(300, 300, function($constraint)
                {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $fileName);
                //
                $Tour->tour_hinhanh = $fileName;
            }else{
                $Tour->tour_hinhanh ="";
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
            $dataTime = date('Ymd_His');
            $file = $request->file('tour_hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png'){
                Session::flash('alert-warning', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg, jpeg!!!');
                return redirect()->route('TOUR_Them');
            }
            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            //resize ảnh
            $destinationPath = public_path('upload/tour');
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(300, 300, function($constraint)
            {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);
            //
            $Tour->tour_hinhanh = $fileName;
        }else{
            $Tour->tour_hinhanh = $Tour->tour_hinhanh;
        }
        $Tour->tour_trangthai = 1;
        $Tour->save();
        
         Session::flash('alert-info', 'Sửa thành công!!!');
         return Redirect()->route('TOUR_DanhSach');
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

    public function getDKT($id){
        $nguoithamgia = DB::table('thongtinnguoidk')
        ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
        ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
        ->join('tinhtrangthuphi','tinhtrangthuphi.tttp_id','=','dk_tour.tttp_id')
        ->where([['dk_tour.tour_id',$id],['congdoanvien.cdv_trangthai','<>',0],])
        ->orderBy('dk_tour.cdv_id','asc')
        ->orderBy('dk_tour.tttp_id','asc')
        ->get();
        return view('admin.Tour.FormDK')->with('nguoithamgia',$nguoithamgia)->with('tour_id',$id);
    }

    function getSearchAjax(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('congdoanvien')
                ->where('cdv_ten','LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
                <li>'.$row->cdv_ten.'</li></br>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function postDKT(Request $request, $id){
        $cdvdk = DB::table('congdoanvien')->where('cdv_ten',$request->cdv_ten)->first();
        if($cdvdk != null){
            $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',$cdvdk->cdv_id],['tttp_id','<>',2],])->first();
            if($temp == null){
                // kiểm tra cdv có tham gia tour cùng giai đoạn
                $tour = DB::table('tour')->where('tour_id',$id)->first();
                $tourtrc = DB::table('dk_tour')
                    ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
                    ->where([['tour.gd_id',$tour->gd_id],['tttp_id','<>',2]])
                    ->select('cdv_id')
                    ->get();
                $cdv_id = $cdvdk->cdv_id;
                if(sizeof($tourtrc) != 0){
                    foreach($tourtrc as $t){
                        $a[] = $t->cdv_id;
                    }
                    if(in_array($cdv_id,$a)){
                        //đăng ký tour mới
                        $datadkt = array();
                        $datadkt['tour_id'] = $id;
                        $datadkt['cdv_id'] = $cdv_id;
                        $datadkt['tttp_id'] = 1;
                        $datadkt['dkt_soluong'] = 1;
                        $datadkt['phihotro'] = 0;
                        $datadkt['created_at'] = date('y-m-d h:i:s');
                        DB::table('dk_tour')->insert($datadkt);
                    }else{
                        // lấy phí hổ trợ
                        $phihotro = DB::table('congdoanvien')
                        ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
                        ->where('cdv_id',$cdv_id)->first();
                        //đăng ký tour mới
                        $datadkt = array();
                        $datadkt['tour_id'] = $id;
                        $datadkt['cdv_id'] = $cdv_id;
                        $datadkt['tttp_id'] = 1;
                        $datadkt['dkt_soluong'] = 1;
                        $datadkt['phihotro'] = $phihotro->mht_phihotro;
                        $datadkt['created_at'] =  date('y-m-d h:i:s');
                        DB::table('dk_tour')->insert($datadkt);
                    }
                }else{
                    // lấy phí hổ trợ
                    $phihotro = DB::table('congdoanvien')
                    ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
                    ->where('cdv_id',$cdv_id)->first();
                    //đăng ký tour mới
                    $datadkt = array();
                    $datadkt['tour_id'] = $id;
                    $datadkt['cdv_id'] = $cdv_id;
                    $datadkt['tttp_id'] = 1;
                    $datadkt['dkt_soluong'] = 1;
                    $datadkt['phihotro'] = $phihotro->mht_phihotro;
                    $datadkt['created_at'] =  date('y-m-d h:i:s');
                    DB::table('dk_tour')->insert($datadkt);
                }
                // cập nhật thông tin người tham gia
                $t = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',$cdvdk->cdv_id],['tttp_id','<>',2],])->first();
                $data = array();
                $data['dkt_id'] = $t->dkt_id;
                $data['ttndk_ten'] = $request->ttndk_ten;
                $data['ttndk_gt'] = $request->ttndk_gt;
                $data['ttndk_tuoi'] = $request->ttndk_tuoi;
                $data['ttndk_cv'] = $request->ttndk_cv;
                $data['ttndk_trangthai'] = 1;
                DB::table('thongtinnguoidk')->insert($data);
                // cập nhật lại số lượng tour
                DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $tour->tour_soluong - 1]);
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                return redirect()->back();
            }else{
                //Cập nhật số lượng tour
                DB::table('dk_tour')
                    ->where([['tour_id',$id],['cdv_id',$cdvdk->cdv_id],['tttp_id','<>',2],])
                    ->update(['dkt_soluong'=>$temp->dkt_soluong + 1]);
                $t = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',$cdvdk->cdv_id],['tttp_id','<>',2],])->first();
                // cập nhật thông tin người tham gia
                $data = array();
                $data['dkt_id'] = $t->dkt_id;
                $data['ttndk_ten'] = $request->ttndk_ten;
                $data['ttndk_gt'] = $request->ttndk_gt;
                $data['ttndk_tuoi'] = $request->ttndk_tuoi;
                $data['ttndk_cv'] = $request->ttndk_cv;
                $data['ttndk_trangthai'] = 1;
                DB::table('thongtinnguoidk')->insert($data);
                // cập nhật lại số lượng tour
                $tour = DB::table('tour')->where('tour_id',$id)->first();
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $tour->tour_soluong - 1]);
                return redirect()->back();
            }
        }else{
            Session::flash('alert-info', 'Công đoàn viên không tồn tại');
            return redirect()->back();
        }
    }
}