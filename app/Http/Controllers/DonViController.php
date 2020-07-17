<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonVi;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class DonViController extends Controller
{
    function __construct(){
        $DonVi = DB::table('DonVi')->where('dv_trangthai',1)->get();
        view()->share('DonVi',$DonVi);
    }
    
    public function getDonVi()
    {   
        $DonVi = DB::table('DonVi')
            ->leftjoin('DonVi as DonVitt','DonVitt.dv_id','=','DonVi.dv_tructhuoc_id')
            ->select('DonVi.*','DonVitt.dv_ten as dv_tt')
            ->get();
        //dd($DonVi);
        return view('admin.DonVi.danhsach')->with('DonVi',$DonVi);
    }

    public function getThem()
    {
        return view('admin.DonVi.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'dv_ten' => 'required',
            'dv_mota' => 'required',
            ],[
                'dv_ten.required' => 'Vui lòng không được để trống tên đơn vị',
                'dv_mota.required' => 'Vui lòng không được để trống mô tả đơn vị',
            ]);
        $data = array();
        $data['dv_ten'] = $request->dv_ten;
        $data['dv_mota'] = $request->dv_mota;
        $data['dv_tructhuoc_id'] = $request->dv_tructhuoc_id;
        $data['dv_trangthai'] = 1;
        DB::table('DonVi')->insert($data);
    	Session::put('message','Thêm đơn vị thành công!!!');
        return redirect()->route('DV_DanhSach');
    }
    public function getSua($id)
    {   
        $DonVi = DonVi::find($id);
        //dd($DonVi);
        return view('admin.DonVi.sua')->with('DonVisua',$DonVi);
    }
    public function postSua(Request $request, $id)
    {   
        $data = array();
        $data['dv_ten'] = $request->dv_ten;
        $data['dv_mota'] = $request->dv_mota;
        $data['dv_tructhuoc_id'] = $request->dv_tructhuoc_id;
        DB::table('DonVi')->where('dv_id',$id)->update($data);
    	Session::flash('alert-info', 'Sửa đơn vị thành công!!!');
        return redirect()->route('DV_DanhSach');
    }

    public function getXoa($id){
        $DonVi = DonVi::find($id);
        $DonVi->dv_trangthai = 0;
        $DonVi->save();
        Session::put('message', 'Xóa thành công!!!');
        return redirect()->route('DV_DanhSach');
    }
    public function getDSDV($id){
        $CongDoanVien = DB::table('CongDoanVien')->where('dv_id',$id)->paginate(5);
        //dd($CongDoanVien);
        return view('admin.CongDoanVien.danhsach')->with('CongDoanVien',$CongDoanVien);
    }
}
