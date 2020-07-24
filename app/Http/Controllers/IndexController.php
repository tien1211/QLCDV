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
        if(!Auth::check()){
            Session::flash('alert-danger', 'Bạn cần đăng nhập để đăng ký tour!!');
            return Redirect::back();
        }else{
            $this->validate($request, [

                'dkt_soluong'=>'required'

                ],[
                    'dkt_soluong.required'=>'Vui lòng nhập số lượng cần đăng ký'
                ]);


            $travel = Tour::find($id);
            $dkttt = DK_Tour::where('tour_id',$id)->get();
            $temp = DB::table('DK_Tour')->where([['tour_id',$id],['cdv_id',Auth::user()->cdv_id],])->get();

            if (sizeof($temp) == 0) {
                $dkt = new DK_Tour();
                $dkt->cdv_id = Auth::user()->cdv_id;
                $dkt->tour_id = $id;
                $dkt->tttp_id  = 0;
                $dkt->dkt_soluong = $request->dkt_soluong;
                $dkt->save();
                Session::flash('alert-info', 'Đăng ký thành công!!!');
                return Redirect::back();
            }else{
                Session::flash('alert-danger', 'Đăng ký tour đã tồn tại!!');
                return Redirect::back();
            }
        }
    }
}
