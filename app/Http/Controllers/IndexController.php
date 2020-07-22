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
use DB;
use Illuminate\Http\Request;

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
        
        // return $a;
        return view('frontend.chitiet')->with('a',$a)->with('b',$b)->with('datail',$datail);
    }
}
