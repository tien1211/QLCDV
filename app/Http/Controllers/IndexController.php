<?php

namespace App\Http\Controllers;
use App\Tour;
use App\CongDoanVien;
use App\ChucVu;
use App\LoaiNhanVien;
use App\DonVi;
use App\LichTrinh;
use App\GiaiDoan;
use App\MucHoTro;
use App\ThongTinNguoiDK;
use App\TinhTrangThuPhi;
use App\DK_Tour;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validate;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __construct(){
        $Tour = Tour::all();
        $ChucVu = ChucVu::all();
        $CongDoanVien = CongDoanVien::all();
        $DK_Tour = DK_Tour::all();
        $DonVi = DonVi::all();
        $GiaiDoan = GiaiDoan::all();
        $LichTrinh = LichTrinh::all();
        $LoaiNhanVien = LoaiNhanVien::all();
        $MucHoTro = MucHoTro::all();
        $ThongTinNguoiDK = ThongTinNguoiDK::all();
        $TinhTrangThuPhi = TinhTrangThuPhi::all();
        $now=  Carbon::now('Asia/Ho_Chi_Minh');
        $ifo= DB::table('Tour')//tour mới
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
            ->orderBy('tour.tour_handk','desc')
            ->limit(3)->get();
            
        $ifo1= DB::table('Tour')//hết hạn
        ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
        ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
        ->where('Tour.tour_ngaykt','<',$now)
        ->orderBy('tour.tour_handk','desc')
        ->limit(3)->get();
        view() ->share('ifo',$ifo);
        view() ->share('ifo1',$ifo1);
        view() ->share('now',$now);
        view()->share('Tour',$Tour);
        view()->share('ChucVu',$ChucVu);
        view()->share('CongDoanVien',$CongDoanVien);
        view()->share('DK_Tour',$DK_Tour);
        view()->share('DonVi',$DonVi);
        view()->share('GiaiDoan',$GiaiDoan);
        view()->share('LichTrinh',$LichTrinh);
        view()->share('LoaiNhanVien',$LoaiNhanVien);
        view()->share('MucHoTro',$MucHoTro);
        view()->share('ThongTinNguoiDK',$ThongTinNguoiDK);
        view()->share('TinhTrangThuPhi',$TinhTrangThuPhi);
    }

    public function getIndex(){
        $moment=  Carbon::now('Asia/Ho_Chi_Minh');   
        $tour1 = DB::table('Tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
            ->where('Tour.tour_ngaykt','>',$moment)
            ->orderBy('tour.tour_handk','desc')
            ->limit(5)->get();
            //dd($tour1);
        return view('frontend.index')->with('tour1',$tour1);
    }

    public function getChiTiet($id){
            $datail=Tour::find($id);
            $a = DB::table('LichTrinh')->join('Tour','LichTrinh.lt_id','=','Tour.lt_id')
                ->join('Anh_Tour','Anh_Tour.lt_id','=','LichTrinh.lt_id')
                ->where('Tour.tour_id','=',$id)
                ->select('*')->get();
            $b = DB::table('Tour')->join('LichTrinh','LichTrinh.lt_id','=','Tour.lt_id')
                ->where('Tour.tour_id','=',$id)
                ->select('*')->get();
            $nguoithamgia = DB::table('thongtinnguoidk')
            ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->where([['dk_tour.tour_id',$id],['thongtinnguoidk.ttndk_trangthai','<>',0],])
            ->get();
            //dd($nguoithamgia);
            $tourkhac = DB::table('Tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
            ->where('tour.tour_id','<>',$id)
            ->limit(4)->get();
            //dd($cdv_dk);
        if(!Auth::check()){
            $temp = [];
                //dd($temp);
            return view('frontend.chitiet')->with('a',$a)->with('b',$b)
                ->with('datail',$datail)
                ->with('tourkhac',$tourkhac)
                ->with('temp',$temp)
                ->with('nguoithamgia',$nguoithamgia);
        }else{
            $temp = DB::table('DK_Tour')
                ->join('tour','tour.tour_id','=','DK_Tour.tour_id')
                ->where([['dk_tour.tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2]])
                ->get();
                //dd($temp);
            return view('frontend.chitiet')->with('a',$a)->with('b',$b)
                ->with('datail',$datail)
                ->with('tourkhac',$tourkhac)
                ->with('temp',$temp)
                ->with('nguoithamgia',$nguoithamgia);
        }
    }
    // đăng ký tour
    public function getFormDK($id) {
        if(!Auth::check()){
            Session::flash('alert-danger', 'Bạn cần đăng nhập để đăng ký tour!!');
            return Redirect::back();
        }else{
            // danh sách người tham gia
            $nguoithamgia = DB::table('thongtinnguoidk')
            ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->where([['dk_tour.tour_id',$id],['dk_tour.cdv_id',Auth::user()->cdv_id],['thongtinnguoidk.ttndk_trangthai','<>',0],])
            ->get();
            // thông tin tour
            $tour = DB::table('tour')->where('tour_id',$id)->first();
            return view('frontend.FormDK')
                ->with('nguoithamgia',$nguoithamgia)
                ->with('tour_id',$id)
                ->with('tour',$tour);
        }
    }
    // xác nhận đăng ký tour
    public function postDKT(Request $request, $id){
        $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])->first();
        if($temp == null){
            //đăng ký tour mới
            $datadkt = array();
            $datadkt['tour_id'] = $id;
            $datadkt['cdv_id'] = Auth::user()->cdv_id;
            $datadkt['tttp_id'] = 1;
            $datadkt['dkt_soluong'] = 1;
            $datadkt['phihotro'] = 1000;
            DB::table('dk_tour')->insert($datadkt);
            $t = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])->first();
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
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $tour->tour_soluong - 1]);
            return redirect()->route('dktour',['id'=>$id]);
        }else{
            //Cập nhật số lượng tour
            DB::table('dk_tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])->update(['dkt_soluong'=>$temp->dkt_soluong + 1]);
            $t = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])->first();
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
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $tour->tour_soluong - 1]);
            return redirect()->route('dktour',['id'=>$id]);
        }
    }
    // Hủy Tour
    public function postDelete($id) {
            $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->first();
            $tour = DB::table('tour')->where('tour_id',$id)->first();
            $soluongconlai = $tour->tour_soluong + $temp->dkt_soluong;

            DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->update(['tttp_id' => 2]);
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
            Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
            return redirect()->route('quanlytour');
    }
    // Danh Sách tour tham gia
    public function getQLTour(){
        if(!Auth::check()){
            Session::flash('alert-danger', 'Bạn cần đăng nhập để quản lý các tour đã đăng ký!!');
            return Redirect::back();
        }else{
            $tourdk = DB::table('dk_tour')
                ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
                ->join('tour','tour.tour_id','=','dk_tour.tour_id')
                ->join('giaidoan','giaidoan.gd_id','=','tour.gd_id')
                ->join('lichtrinh','lichtrinh.lt_id','=','tour.lt_id')
                ->where([['dk_tour.cdv_id','=',Auth::user()->cdv_id],['dk_tour.tttp_id','<>',2]])
                ->get();
            //dd($tourdk);
            return view('frontend.quanlytour')->with('tourdk',$tourdk);
        }
    }
    // Thêm thông tin người tham gia tour
    public function postTTDK(Request $request, $id){
        $tour = DB::table('tour')->where('tour_id',$id)->first();
        $soluongconlai = $tour->tour_soluong - $request->dkt_soluong;
        //MucHoTro
        $tourtrc = DB::table('dk_tour')
        ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
        ->where([['tour.gd_id',$tour->gd_id],['tttp_id','<>',2]])
        ->select('cdv_id')
        ->get();
        $cdv_id = Auth::user()->cdv_id;
        if(sizeof($tourtrc) != 0){
            foreach($tourtrc as $t){
                $a[] = $t->cdv_id;
            }
            if(in_array($cdv_id,$a)){
                $dkt = new DK_Tour();
                $dkt->cdv_id = $cdv_id;
                $dkt->tour_id = $id;
                $dkt->tttp_id  = 1;
                $dkt->dkt_soluong = $request->dkt_soluong;
                $dkt->phihotro = 0;
                //return $dkt->dkt_soluong;
                $dkt->save();
                DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                $data = array();
                for($i=0; $i<$request->dkt_soluong; $i++){     
                    $data['dkt_id'] = $dkt->dkt_id;
                    $data['ttndk_ten'] = $request->ttndk_ten[$i];
                    $data['ttndk_gt'] = $request->ttndk_gt[$i];
                    $data['ttndk_cmnd'] = $request->ttndk_cmnd[$i];
                    $data['ttndk_trangthai'] = 1;
                    //echo $data;
                    DB::table('thongtinnguoidk')->insert($data);
                }
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                return redirect()->route('chitiettour',['id'=>$id]);
            }else{
                $phihotro = DB::table('congdoanvien')
                    ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
                    ->where('cdv_id',$cdv_id)->first();
                $dkt = new DK_Tour();
                $dkt->cdv_id = $cdv_id;
                $dkt->tour_id = $id;
                $dkt->tttp_id  = 1;
                $dkt->dkt_soluong = $request->dkt_soluong;
                $dkt->phihotro = $phihotro->mht_phihotro;
                //return $dkt->dkt_soluong;
                $dkt->save();
                DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
                $data = array();
                for($i=0; $i<$request->dkt_soluong; $i++){     
                    $data['dkt_id'] = $dkt->dkt_id;
                    $data['ttndk_ten'] = $request->ttndk_ten[$i];
                    $data['ttndk_gt'] = $request->ttndk_gt[$i];
                    $data['ttndk_cmnd'] = $request->ttndk_cmnd[$i];
                    $data['ttndk_trangthai'] = 1;
                    //echo $data;
                    DB::table('thongtinnguoidk')->insert($data);
                }
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                return redirect()->route('chitiettour',['id'=>$id]);
            }
        }else{
            $phihotro = DB::table('congdoanvien')
                ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
                ->where('cdv_id',$cdv_id)->first();
            $dkt = new DK_Tour();
            $dkt->cdv_id = $cdv_id;
            $dkt->tour_id = $id;
            $dkt->tttp_id  = 1;
            $dkt->dkt_soluong = $request->dkt_soluong;
            $dkt->phihotro = $phihotro->mht_phihotro;
            //return $dkt->dkt_soluong;
            $dkt->save();
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
            $data = array();
            for($i=0; $i<$request->dkt_soluong; $i++){     
                $data['dkt_id'] = $dkt->dkt_id;
                $data['ttndk_ten'] = $request->ttndk_ten[$i];
                $data['ttndk_gt'] = $request->ttndk_gt[$i];
                $data['ttndk_cmnd'] = $request->ttndk_cmnd[$i];
                $data['ttndk_trangthai'] = 1;
                //echo $data;
                DB::table('thongtinnguoidk')->insert($data);
            }
            Session::flash('alert-info', 'Đăng ký thành công!!!');
            return redirect()->route('chitiettour',['id'=>$id]);
        }
    }

    public function postCNTTDK(Request $request, $id){
        // cập nhật số lượng người tham gia
        $tourtrc = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->first();
        $soluongmoi = $tourtrc->dkt_soluong + $request->dkt_soluong;
        $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->update(['dkt_soluong' => $soluongmoi]);
        // cập nhật số lượng tour
        $tour = DB::table('tour')->where('tour_id',$id)->first();
        $soluongconlai = $tour->tour_soluong - $request->dkt_soluong;
        DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
        $data = array();
        for($i=0; $i<$request->dkt_soluong; $i++){     
            $data['dkt_id'] = $tourtrc->dkt_id;
            $data['ttndk_ten'] = $request->ttndk_ten[$i];
            $data['ttndk_gt'] = $request->ttndk_gt[$i];
            $data['ttndk_cmnd'] = $request->ttndk_cmnd[$i];
            $data['ttndk_trangthai'] = 1;
            //echo $data;
            DB::table('thongtinnguoidk')->insert($data);
        }
        Session::flash('alert-info', 'Cập nhật thành công!!!');
        return redirect()->route('chitiettour',['id'=>$id]);
    }

    public function getDSNTG($id){
        $tour = DB::table('tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->where('tour_id',$id)->first();
        //dd($tour);
        $nguoithamgia = DB::table('thongtinnguoidk')
            ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->where([['dk_tour.tour_id',$id],['dk_tour.cdv_id',Auth::user()->cdv_id],['thongtinnguoidk.ttndk_trangthai','<>',0],])
            ->get();
        //dd($nguoithamgia);
        return view('frontend.danhsachnguoithamgia')->with('nguoithamgia',$nguoithamgia)->with('tour',$tour);
    }
    
    public function postXNTG(Request $request, $id){
        $ntg = $request->ttndk_id;
        foreach($ntg as $t){
            DB::table('thongtinnguoidk')
                ->where('ttndk_id',$t)
                ->update(['ttndk_trangthai'=>0]);
        }
        // //cập nhật lại số lượng tour
        $tour = DB::table('tour')
            ->where('tour_id',$id)
            ->first();
        $soluongmoi = $tour->tour_soluong + count($ntg);
        DB::table('tour')
            ->where('tour_id',$id)
            ->update(['tour_soluong' => $soluongmoi]);
        //cập nhật lại số lượng đăng ký tour
        $tourdk = DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])
            ->first();
        $soluongconlai = $tourdk->dkt_soluong - count($ntg);
        DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])
            ->update(['dkt_soluong' => $soluongconlai]);
        // cập nhật lại hủy tour
        if($soluongconlai == 0){
            DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])
            ->update(['tttp_id' => 2]);
            return redirect()->route('quanlytour');
        }
        return redirect()->route('DS_NTG',['id'=>$id]);
    }

    public function getProfile($id){
        $profile = CongDoanVien::find($id);
        return view('frontend.profile')->with("profile",$profile);
    }
}
