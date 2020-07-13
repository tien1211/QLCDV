<?php

namespace App\Http\Controllers;
use App\CongDoanVien;
use Illuminate\Http\Request;

class CongDoanVienController extends Controller
{
    public function getDanhSach(){
        $CongDoanVien = CongDoanVien::all();
        return view("admin.congdoanvien.danhsach")->with('cdv',$CongDoanVien);
    }


}
