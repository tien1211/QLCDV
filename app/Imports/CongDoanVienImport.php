<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Carbon;
class CongDoanVienImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $value){
            #Định dạng ngày;
            if($key>0){
                
                DB::table('CongDoanVien')->insert([
                    'dv_id' => $value[0],
                    'cv_id' => $value[1],
                    'lnv_id' => $value[2],
                    'mht_id' => 1,
                    'cdv_ten' => $value[4],
                    'cdv_ngaysinh' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[5]))->format('Y-m-d'),
                    'cdv_gioitinh' => $value[6],#1 là nam 0 là nữ
                    'cdv_cmnd' => $value[7],
                    'cdv_nguyenquan' => $value[8],
                    'cdv_diachi' => $value[9],
                    'cdv_sdt' => 0 .$value[10],
                    'cdv_email' => $value[11],
                    'cdv_dantoc' => $value[12],
                    'cdv_trinhdo' => $value[13],
                    'cdv_tongiao' => $value[14],
                    'cdv_ngaythuviec' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[15]))->format('Y-m-d'),
                    'cdv_ngayvaonganh' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[16]))->format('Y-m-d'),
                    'cdv_trangthai' => 1,
                    'cdv_hinhanh' => $value[18],
                    'cdv_username' => $value[19],
                    'password' => bcrypt($value[20]),
                    'cdv_quyen' => $value[21]
                ]);
            }
        }
    }
}