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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DSNTGExport;



class TourController extends Controller
{

    function __construct(){
        $LichTrinh = DB::table('LichTrinh')->where('lt_trangthai',1)->get();
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
        $Tour = Tour::where('tour_trangthai','=',1)->orderBy('tour.tour_handk','desc')->paginate(10);
        return view('admin.Tour.danhsach')->with('Tour',$Tour);
    }

// Thêm

    public function getThem(){
        $LichTrinh = DB::table('LichTrinh')->where('lt_trangthai',1)->get();
        return view('admin.Tour.them')->with('LichTrinh',$LichTrinh);
    }

    public function postThem(Request $request){

        $validation = $this->validate($request,
        [
            'tour_handk' => 'required|date|after:now',
            'tour_ngaybd' => 'required|date|after:tour_handk',
            'tour_ngaykt' => 'required|date|after:tour_ngaybd',
        ],
        [
            'require' => 'Bạn chưa chọn ngày!',
            'tour_handk.after' => 'Hạn đăng ký phải lớn hơn ngày hiện tại!',
            'tour_ngaybd.after' => 'Ngày bắt đầu phải lớn hơn hạn đăng ký!',
            'tour_ngaykt.after' => 'Ngày kết thúc phải lớn hơn ngày bắt đầu!'
        ]);

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
                $resize_image->resize(710, 399, function($constraint)
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
            Session::flash('alert-1', 'Thêm thành công!!!');
            return Redirect()->route('TOUR_DanhSach');
}
// Sửa
    public function getSua($id){
        $Tour = Tour::find($id);
        return view('admin.Tour.sua')->with('Tour',$Tour);
    }

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
            $resize_image->resize(710, 399, function($constraint)
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

        Session::flash('alert-2', 'Sửa thành công!!!');
        return Redirect()->route('TOUR_DanhSach');
    }

    public function getXoa($id){
        $Tour = Tour::find($id);
        $Tour->tour_trangthai = 0;
        $Tour->save();
        Session::flash('alert-3', 'Xóa thành công!!!');
        return Redirect::back();
    }


    public function postTimkiem(Request $request){
        $gd_id = $request->gd_id;
        $ngaybd = $request->tour_ngaybd;
        $ngaykt = $request->tour_ngaykt;
        $lt_id = $request->lt_id;
        //dd($ngaybd);
        if((!empty($gd_id)) && (!empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_ngaybd','>',$ngaybd],['tour_ngaykt','<=',$ngaykt],])->paginate(10);;
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_ngaybd','>',$ngaybd],['tour_ngaykt','<=',$ngaykt],['tour_trangthai','=',1],])->paginate(10);;
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_ngaykt','<=',$ngaykt],['tour_trangthai','=',1],])->paginate(10);;
        }
        else if((!empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_ngaybd','>',$ngaybd],['tour_trangthai','=',1],])->paginate(10);;
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['gd_id','=', $gd_id],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_ngaybd','>',$ngaybd],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_ngaykt','<=',$ngaykt],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((empty($gd_id)) && (empty($ngaybd)) && (empty($ngaykt)) && (!empty($lt_id))){
            $Tour = Tour::where([['lt_id','=',$lt_id],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (!empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['tour_ngaybd','>=',$ngaybd],['tour_ngaykt','<=',$ngaykt],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (empty($lt_id))){
                $Tour = Tour::where([['gd_id','=', $gd_id],['tour_ngaykt','<=',$ngaykt],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((!empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['gd_id','=', $gd_id],['tour_ngaybd','>',$ngaybd],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((!empty($gd_id)) && (empty($ngaybd)) && (empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['gd_id','=', $gd_id],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((empty($gd_id)) && (!empty($ngaybd)) && (empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['tour_ngaybd','>',$ngaybd],['tour_trangthai','=',1],])->paginate(10);
        }
        else if((empty($gd_id)) && (empty($ngaybd)) && (!empty($ngaykt)) && (empty($lt_id))){
            $Tour = Tour::where([['tour_ngaykt','<=',$ngaykt],['tour_trangthai','=',1],])->paginate(10);
        }else{
            $Tour = Tour::where('tour_trangthai','=',1)->paginate(10);;
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
        // dd($nguoithamgia);
        $cdv_dk = DB::table('dk_tour')
            ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->where([['dk_tour.tour_id',$id],['congdoanvien.cdv_trangthai','<>',0],['dk_tour.tttp_id','<>',2]])
            ->orderBy('dk_tour.dkt_id','desc')
            ->get();
        return view('admin.Tour.chitiet')->with('chitietTour',$chitietTour)
            ->with('nguoithamgia',$nguoithamgia)
            ->with('cdv_dk',$cdv_dk)
            ->with('tour_id',$id);

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
        $tour = DB::table('tour')
            ->where('tour_id',$id)
            ->first();
        return view('admin.Tour.FormDK')->with('nguoithamgia',$nguoithamgia)->with('tour_id',$id)->with('tour',$tour);
    }

    function getSearchAjax(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('congdoanvien')
                ->where('cdv_ten','LIKE', "%{$query}%")
                ->get();
            $output = '<select class="form-control m-bot15" name="cdv_id">';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->cdv_id.'">'.$row->cdv_ten.' sinh ngày: '.date('d-m-Y ',strtotime($row->cdv_ngaysinh)).'</option>';
            }
            $output .= '</select>';
            echo $output;
        }
    }

    public function postDKT(Request $request, $id){
        $cdvdk = DB::table('congdoanvien')->where('cdv_id',$request->cdv_id)->first();
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
                Session::flash('alert-success', 'Đăng ký thành công!!!');
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
            Session::flash('alert-danger', 'Chưa chọn công đoàn viên!!');
            return redirect()->back();
        }
    }


    public function postXNDK(Request $request, $id){
        $validation = $this->validate($request,
        [
            'ttndk_id' => 'required',
        ],
        [
            'ttndk_id.required' => 'Bạn chưa chọn người tham gia!',
        ]);
        $ntg = $request->ttndk_id;
        foreach($ntg as $t){
            DB::table('thongtinnguoidk')
                ->where('ttndk_id',$t)
                ->update(['ttndk_trangthai'=>0]);
            //cập nhật lại số lượng đăng ký tour
            $dkt = DB::table('thongtinnguoidk')
                ->where('ttndk_id',$t)
                ->first();
            $tourdk = DB::table('dk_tour')
                ->where([['dkt_id',$dkt->dkt_id],['tttp_id','<>',2],])
                ->first();
            $soluongconlai = $tourdk->dkt_soluong - 1;
            DB::table('dk_tour')
                ->where([['dkt_id',$dkt->dkt_id],['tttp_id','<>',2],])
                ->update(['dkt_soluong' => $soluongconlai]);
            // cập nhật lại hủy tour
            if($soluongconlai == 0){
                DB::table('dk_tour')
                ->where([['dkt_id',$dkt->dkt_id],['tttp_id','<>',2],])
                ->update(['tttp_id' => 2]);
                //Cập nhật mức hổ trợ cho tour khác
                if($tourdk->phihotro == 0){
                    continue;
                }else{
                    $tourgd = DB::table('tour')
                        ->where([['tour_id',$id],['tour_trangthai',1],])
                        ->first();
                    $cdv_id = $tourdk->cdv_id;
                    // lấy mức hổ trợ
                    $phihotro = DB::table('congdoanvien')
                    ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
                    ->where('cdv_id',$cdv_id)->first();
                    $tourtrc = DB::table('dk_tour')
                        ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
                        ->where([['tour.gd_id',$tourgd->gd_id],['cdv_id',$cdv_id],['tttp_id','<>',2]])
                        ->orderBy('dk_tour.created_at','asc')
                        ->limit(1)
                        ->update(['dk_tour.phihotro'=>$phihotro->mht_phihotro]);
                    continue;
                }
            }else{
                continue;
            }
        }
        //cập nhật lại số lượng tour
        $tour = DB::table('tour')
            ->where([['tour_id',$id],['tour_trangthai',1],])
            ->first();
        $soluongmoi = $tour->tour_soluong + count($ntg);
        DB::table('tour')
            ->where('tour_id',$id)
            ->update(['tour_soluong' => $soluongmoi]);
        Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
        return redirect()->route('TOUR_ChiTiet',['id'=>$id]);
    }

    public function postThemGD(Request $request)
    {
        $GiaiDoan = new GiaiDoan();

        $name = $request->giai_doan1. " - " .$request->giai_doan2;
        $GiaiDoan->giai_doan = $name;
        $GiaiDoan->gd_trangthai = 1;
        $GiaiDoan->save();
        Session::flash('alert-1', 'Thêm thành công!!!');
        return redirect()->route('TOUR_Them');
    }

    public function getHinh($id){
        $hinh = DB::table('anh_tour')
            ->join('tour','tour.tour_id','=','anh_tour.tour_id')
            ->where([['anh_tour.tour_id',$id],['at_trangthai',1]])->get();
        return view('admin.Tour.danhsachhinh')->with('hinh',$hinh)->with('tour_id',$id);
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
            $data['tour_id'] = $id;
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

    public function getXoaHinh(Request $request){
        $at_id = $request->at_id;
        foreach($at_id as $anh){
            DB::table('anh_tour')->where('at_id',$anh)->update(['at_trangthai'=>0]);
        }
        Session::flash('alert-info', 'Xóa Thành Công!!!');
        return Redirect::back();
    }

}
