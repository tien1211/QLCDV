<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use App\CongDoanVien;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use App\Tour;
use App\LichTrinh;
use App\GiaiDoan;
use App\TinhTrangThuPhi;
use Validate;
use Session;
use DB;


class DSNTGExport implements FromView,ShouldAutoSize
{

protected $id;

public function __construct($id) {
       $this->id = $id;
}
    public function view(): View
        {
            return view('admin.Tour.Tour-Excel', [
                'thongtin' => DB::table('thongtinnguoidk')
                ->join('dk_tour','dk_tour.dkt_id','=','thongtinnguoidk.dkt_id')
                ->join('congdoanvien','congdoanvien.cdv_id','=','dk_tour.cdv_id')
                ->where([['dk_tour.tour_id',$this->id],['congdoanvien.cdv_trangthai','<>',0],['thongtinnguoidk.ttndk_trangthai', '=',1]])
                ->orderBy('dk_tour.cdv_id','asc')
                ->orderBy('dk_tour.tttp_id','asc')
                ->get()
            ]);
        }
}
