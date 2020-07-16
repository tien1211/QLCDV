<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonVi;
use Illuminate\Support\Facades\Redirect;
use DB;

class DonViController extends Controller
{
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
        $DonVi = DonVi::all();
        return view('admin.DonVi.them')->with('DonVi',$DonVi);
    }
    public function postSua(Request $request)
    {
        $data = array();
        $data['tc_ten'] = $request->tc_ten;
        $data['tc_tructhuoc'] = $request->tc_tructhuoc;
        $data['tc_gioithieu'] = $request->tc_gioithieu;
        $data['tc_nhiemvu'] = $request->tc_nhiemvu;
        $date['updated_at'] = date('Y-M-D');
        ToChuc::where('tc_id',1)->update($data);

        return Redirect::back();
    }
}
