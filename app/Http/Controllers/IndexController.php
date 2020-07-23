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
        return view('frontend.index');
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
        $dk_t = DB::table('Tour')->join('LichTrinh','LichTrinh.lt_id','=','Tour.lt_id')
        ->join('DK_Tour','DK_Tour.tour_id','=','Tour.tour_id')
        ->join('CongDoanVien','CongDoanVien.cdv_id','=','DK_Tour.cdv_id')
        ->where('Tour.tour_id',$id)->select('*')->get();
        
        // return $dk_t;
        return view('frontend.chitiet')->with('a',$a)->with('b',$b)
        ->with('datail',$datail)
        ->with('dk_t',$dk_t);
    }


    public function postBook(Request $request, $id)
    {
        $travel = Tour::find($id);
        $dkt = new DK_Tour();
        $dkt->cdv_id = Auth::user()->cdv_id;
        $dkt->tour_id = $id;
        $dkt->tttp_id  = 1;
        $dkt->dkt_soluong = $request->dkt_soluong;
        $dkt->save();
        Session::flash('alert-info', 'Đăng ký thành công!!!');
        return Redirect::back(); 
        
    }
}
