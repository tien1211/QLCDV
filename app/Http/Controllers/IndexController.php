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
            ->paginate(5);
           
        return view('frontend.index')->with('tour1',$tour1);
    }

    public function getChiTiet($id){
            $now=  Carbon::now('Asia/Ho_Chi_Minh');
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
            $tourkhac = DB::table('Tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
            ->where([['tour.tour_id','<>',$id],['tour.tour_handk','>',$now]])
            ->orderBy('tour.tour_handk','desc')
            ->limit(4)->get();
            
        if(!Auth::check()){
            $temp = [];
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
            // kiểm tra cdv có tham gia tour cùng giai đoạn
            $tour = DB::table('tour')->where('tour_id',$id)->first();
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
                    //đăng ký tour mới
                    $datadkt = array();
                    $datadkt['tour_id'] = $id;
                    $datadkt['cdv_id'] = Auth::user()->cdv_id;
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
                    $datadkt['cdv_id'] = Auth::user()->cdv_id;
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
                $datadkt['cdv_id'] = Auth::user()->cdv_id;
                $datadkt['tttp_id'] = 1;
                $datadkt['dkt_soluong'] = 1;
                $datadkt['phihotro'] = $phihotro->mht_phihotro;
                $datadkt['created_at'] =  date('y-m-d h:i:s');
                DB::table('dk_tour')->insert($datadkt);
            }
            // cập nhật thông tin người tham gia
            $t = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])->first();
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
            return redirect()->route('dktour',['id'=>$id]);
        }else{
            //Cập nhật số lượng tour
            DB::table('dk_tour')
                ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])
                ->update(['dkt_soluong'=>$temp->dkt_soluong + 1]);
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
            Session::flash('alert-info', 'Đăng ký thành công!!!');
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $tour->tour_soluong - 1]);
            return redirect()->route('dktour',['id'=>$id]);
        }
    }
    // Hủy Tour
    public function postDelete($id) {
        // Cập nhật lại số lượng tour
        $temp = DB::table('dk_tour')->where('dkt_id',$id)->first();
        $tour = DB::table('tour')->where('tour_id',$temp->tour_id)->first();
        $soluongconlai = $tour->tour_soluong + $temp->dkt_soluong;
        DB::table('tour')->where('tour_id',$temp->tour_id)->update(['tour_soluong' => $soluongconlai]);
        // Cập nhật trạng thái tour
        DB::table('DK_Tour')->where('dkt_id',$id)->update(['tttp_id' => 2]);
        // Cập nhật trạng thái người đăng ký tour
        $ntg = DB::table('thongtinnguoidk')->where('dkt_id',$id)->get();
        foreach ($ntg as $t){
            DB::table('thongtinnguoidk')
                ->where('ttndk_id',$t->ttndk_id)
                ->update(['ttndk_trangthai'=>0]);
        }
        //Cập nhật mức hổ trợ cho tour khác
        if($temp->phihotro == 0){
            Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
            return redirect()->route('quanlytour');
        }else{
            $cdv_id = Auth::user()->cdv_id;
            // lấy mức hổ trợ
            $phihotro = DB::table('congdoanvien')
            ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
            ->where('cdv_id',$cdv_id)->first();
            $tourtrc = DB::table('dk_tour')
                ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
                ->where([['tour.gd_id',$tour->gd_id],['cdv_id',$cdv_id],['tttp_id','<>',2]])
                ->orderBy('dk_tour.created_at','asc')
                ->limit(1)
                ->update(['dk_tour.phihotro'=>$phihotro->mht_phihotro]);
            Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
            return redirect()->route('quanlytour');
        }
    }
    // Danh Sách tour đã đăng ký
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
                ->orderBy('tour.tour_handk','desc')
                ->get();
            return view('frontend.quanlytour')->with('tourdk',$tourdk);
        }
    }
    // Danh sách người đăng ký
    public function getDSNTG($id){
        $tour = DB::table('tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->where('tour_id',$id)->first();
        $nguoithamgia = DB::table('thongtinnguoidk')
            ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
            ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
            ->where([['dk_tour.tour_id',$id],['dk_tour.cdv_id',Auth::user()->cdv_id],['thongtinnguoidk.ttndk_trangthai','<>',0],])
            ->get();
        return view('frontend.danhsachnguoithamgia')->with('nguoithamgia',$nguoithamgia)->with('tour',$tour);
    }
    // Xóa người đăng ký
    public function postXNTG(Request $request, $id){
        $ntg = $request->ttndk_id;
        foreach($ntg as $t){
            DB::table('thongtinnguoidk')
                ->where('ttndk_id',$t)
                ->update(['ttndk_trangthai'=>0]);
        }
        //cập nhật lại số lượng tour
        $tour = DB::table('tour')
            ->where('tour_id',$id)
            ->first();
        $soluongmoi = $tour->tour_soluong + count($ntg);
        DB::table('tour')
            ->where('tour_id',$id)
            ->update(['tour_soluong' => $soluongmoi]);
        //cập nhật lại số lượng đăng ký tour
        $tourdk = DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])
            ->first();
        $soluongconlai = $tourdk->dkt_soluong - count($ntg);
        DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])
            ->update(['dkt_soluong' => $soluongconlai]);
        // cập nhật lại hủy tour
        if($soluongconlai == 0){
            DB::table('dk_tour')
            ->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',2],])
            ->update(['tttp_id' => 2]);
            //Cập nhật mức hổ trợ cho tour khác
            if($tourdk->phihotro == 0){
                Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
                return redirect()->route('quanlytour');
            }else{
                $cdv_id = Auth::user()->cdv_id;
                // lấy mức hổ trợ
                $phihotro = DB::table('congdoanvien')
                ->join('muchotro','muchotro.mht_id','=','congdoanvien.mht_id')
                ->where('cdv_id',$cdv_id)->first();
                $tourtrc = DB::table('dk_tour')
                    ->join('Tour','Tour.tour_id','=','dk_tour.tour_id')
                    ->where([['tour.gd_id',$tour->gd_id],['cdv_id',$cdv_id],['tttp_id','<>',2]])
                    ->orderBy('dk_tour.created_at','asc')
                    ->limit(1)
                    ->update(['dk_tour.phihotro'=>$phihotro->mht_phihotro]);
                Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
                return redirect()->route('quanlytour');
            }
        }else{
        Session::flash('alert-info', 'Xóa thành công!!!');
        return redirect()->route('DS_NTG',['id'=>$id]);
        }
    }

    public function getProfile($id){
        $profile = CongDoanVien::find($id);
        return view('frontend.profile')->with("profile",$profile);
    }

    public function getTourdadienra(){
        $hi = Carbon::now('Asia/Ho_Chi_Minh');
        $deadline= DB::table('Tour')//hết hạn
        ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
        ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
        ->where('Tour.tour_ngaykt','<',$hi)
        ->orderBy('tour.tour_handk','desc')
        ->get();

        return view('frontend.tourdadienra')->with('deadline',$deadline);
    }


}
