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


    public function getIndex()
    {   
        $tour1 = DB::table('Tour')
            ->join('lichtrinh','lichtrinh.lt_id','=','Tour.lt_id')
            ->join('giaidoan','giaidoan.gd_id','=','Tour.gd_id')
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
            $cdv_dk = DB::table('dk_tour')
            ->join('Tour','Tour.tour_id','=','dk_Tour.tour_id')
            ->join('CongDoanVien','CongDoanVien.cdv_id','=','DK_Tour.cdv_id')
            ->where('Tour.tour_id',$id)->select('*')->get();
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
                ->with('cdv_dk',$cdv_dk)
                ->with('tourkhac',$tourkhac)
                ->with('temp',$temp);
        }else{
            $temp = DB::table('DK_Tour')
                ->join('tour','tour.tour_id','=','DK_Tour.tour_id')
                ->where([['dk_tour.tour_id',$id],['cdv_id',Auth::user()->cdv_id],['tttp_id','<>',3]])
                ->get();
                //dd($temp);
            return view('frontend.chitiet')->with('a',$a)->with('b',$b)
                ->with('datail',$datail)
                ->with('cdv_dk',$cdv_dk)
                ->with('tourkhac',$tourkhac)
                ->with('temp',$temp);
        }
    }


    public function postBook(Request $request, $id)
    {
        if(!Auth::check()){
            Session::flash('alert-danger', 'Bạn cần đăng nhập để đăng ký tour!!');
            return Redirect::back();
        }else{
            $this->validate($request, [

                'dkt_soluong'=>'required'

                ],[
                    'dkt_soluong.required'=>'Vui lòng nhập số lượng cần đăng ký'
                ]);
           // $travel = Tour::find($id);
            //$dkttt = DK_Tour::where('tour_id',$id)->get();
            $tour = DB::table('tour')->where('tour_id',$id)->first();
            $soluongconlai = $tour->tour_soluong - $request->dkt_soluong;
            //dd($soluongconlai);
                $dkt = new DK_Tour();
                $dkt->cdv_id = Auth::user()->cdv_id;
                $dkt->tour_id = $id;
                $dkt->tttp_id  = 2;
                $dkt->dkt_soluong = $request->dkt_soluong;
                //return $dkt->dkt_soluong;
                $dkt->save();
                DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                return Redirect::back();
        }
    }
    
    public function postUpdate(Request $request, $id)
    {
            $this->validate($request, [
                'dkt_soluong'=>'required'
                ],[
                    'dkt_soluong.required'=>'Vui lòng nhập số lượng cần cập nhật'
                ]);
            // cập nhật số lượng người tham gia
            $tourtrc = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->first();
            $soluongmoi = $tourtrc->dkt_soluong + $request->dkt_soluong;
            $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->update(['dkt_soluong' => $soluongmoi]);
            // cập nhật số lượng tour
            $tour = DB::table('tour')->where('tour_id',$id)->first();
            $soluongconlai = $tour->tour_soluong - $request->dkt_soluong;
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
            Session::flash('alert-info', 'Cập nhật thành công!!!');
            return Redirect::back();
    }

    public function postDelete($id)
    {
            $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->first();
            $tour = DB::table('tour')->where('tour_id',$id)->first();
            $soluongconlai = $tour->tour_soluong + $temp->dkt_soluong;

            DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->update(['tttp_id' => 3]);
            DB::table('tour')->where('tour_id',$id)->update(['tour_soluong' => $soluongconlai]);
            Session::flash('alert-info', 'Hủy đăng ký thành công!!!');
            return Redirect::back();
    }

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
                ->where([['dk_tour.cdv_id','=',Auth::user()->cdv_id],['dk_tour.tttp_id','<>',3]])
                ->get();
            //dd($tourdk);
            return view('frontend.quanlytour')->with('tourdk',$tourdk);
        }
    }
}
