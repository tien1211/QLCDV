<?php

namespace App\Http\Controllers;
use App\CongDoanVien;
use Illuminate\Http\Request;
use App\ChucVu;
use App\LoaiNhanVien;
use App\MucHoTro;
class CongDoanVienController extends Controller
{

    function __construct(){
		$ChucVu = ChucVu::all();
    	$LoaiNhanVien = LoaiNhanVien::all();
        $MucHoTro = MucHoTro::all();
    	view()->share('ChucVu',$ChucVu);
        view()->share('LoaiNhanVien',$LoaiNhanVien);
        view()->share('MucHoTro',$MucHoTro);
	}



    public function getDanhSach(){
        $CongDoanVien = CongDoanVien::all();
        return view('admin.CongDoanVien.danhsach')->with('CongDoanVien',$CongDoanVien);
    }


    public function getThem(){
        return view('admin.CongDoanVien.them');
    }

    public function postThem(Request $request){

    }

}
