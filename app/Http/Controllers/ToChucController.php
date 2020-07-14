<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToChuc;
use Illuminate\Support\Facades\Redirect;

class ToChucController extends Controller
{
    public function getToChuc()
    {
        $tochuc = ToChuc::find(1)->get();
        //dd($tochuc);
        return view('admin.ToChuc.to_chuc')->with('tochuc',$tochuc);
    }

    public function getSua()
    {
        $tochuc = ToChuc::find(1)->get();
        return view('admin.ToChuc.capnhat')->with('tochuc',$tochuc);
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
