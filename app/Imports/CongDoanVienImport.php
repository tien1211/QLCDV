<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Carbon;
use Validator;
use Session;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class CongDoanVienImport implements ToCollection,WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $value){
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
                    'cdv_trangthai' => $value[17],
                    'cdv_hinhanh' => $value[18],
                    'cdv_username' => $value[19],
                    'password' => bcrypt($value[20]),
                    'cdv_quyen' => $value[21]
                ]);


                // DB::table('CongDoanVien')->insert([
                //     'dv_id' => $value['dv_id'],
                //     'cv_id' => $value['cv_id'],
                //     'lnv_id' => $value['lnv_id'],
                //     'mht_id' => 1,
                //     'cdv_ten' => $value['cdv_ten'],
                //     'cdv_ngaysinh' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['cdv_ngaysinh']))->format('Y-m-d'),
                //     'cdv_gioitinh' => $value['cdv_gioitinh'],#1 là nam 0 là nữ
                //     'cdv_cmnd' => $value['cdv_cmnd'],
                //     'cdv_nguyenquan' => $value['cdv_nguyenquan'],
                //     'cdv_diachi' => $value['cdv_diachi'],
                //     'cdv_sdt' => 0 .$value['cdv_sdt'],
                //     'cdv_email' => $value['cdv_email'],
                //     'cdv_dantoc' => $value['cdv_dantoc'],
                //     'cdv_trinhdo' => $value['cdv_trinhdo'],
                //     'cdv_tongiao' => $value['cdv_tongiao'],
                //     'cdv_ngaythuviec' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['cdv_ngaythuviec']))->format('Y-m-d'),
                //     'cdv_ngayvaonganh' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['cdv_ngayvaonganh']))->format('Y-m-d'),
                //     'cdv_trangthai' => $value['cdv_trangthai'],
                //     'cdv_hinhanh' => $value['cdv_hinhanh'],
                //     'cdv_username' => $value['cdv_username'],
                //     'password' => bcrypt($value['password']),
                //     'cdv_quyen' => $value['cdv_quyen']
                // ]);
            }
        }
    }


    public function rules(): array{
        return [
            'cv_id' => 'required',
            'lnv_id' => 'required',
            'dv_id'=>'required',
            'cdv_ten'=>'bail|required',
            'cdv_ngaysinh'=>'required',
            'cdv_gioitinh'=>'required',
            'cdv_cmnd'=>'required|max:9|min:9',
            'cdv_nguyenquan'=>'required',
            'cdv_diachi'=>'bail|required',
            'cdv_sdt'=>'required|max:9|min:9',
            'cdv_email'=>'required|unique:CongDoanVien',
            'cdv_dantoc'=>'required',
            'cdv_trinhdo'=>'required',
            'cdv_tongiao'=>'bail|required',
            'cdv_ngaythuviec'=>'required',
            'cdv_ngayvaonganh'=>'required',
            'cdv_username'=>'bail|required|unique:CongDoanVien',
            'password'=>'required|min:8|max:50',
            'cdv_quyen' => 'required',
            'cdv_trangthai' => 'required',
            'cdv_hinhanh' => 'required'
        ];
    }


    public function customValidationMessages(){
        return [
            'cv_id.required' => 'Vui lòng không được để trống chức vụ',
                'lnv_id.required' => 'Vui lòng không được để trống loại nhân viên',
                'dv_id.required'=>'Vui lòng không được để trống đơn vị',
                'cdv_ten.required'=>'Vui lòng không được để trống tên công đoàn viên',
                'cdv_ngaysinh.required'=>'Vui lòng không được để trống ngày sinh',
                'cdv_gioitinh.required'=>'Vui lòng không được để trống giới tính',
                'cdv_cmnd.required' => 'Vui lòng không được để trống CMND',
                'cdv_cmnd.min' => 'CMND phải ít nhất 9 kí tự',
                'cdv_cmnd.max' => 'CMND phải không quá 9 kí tự',
                'cdv_nguyenquan.required'=>'Vui lòng không được để trống nguyên quán',
                'cdv_diachi.required'=>'Vui lòng không được để trống địa chỉ',
                'cdv_sdt.required'=>'Vui lòng không được để trống số điện thoại',
                'cdv_sdt.min' => 'Số điện thoại phải ít nhất 10 kí tự',
                'cdv_sdt.max' => 'Số điện thoại phải không quá 10 kí tự',
                'cdv_email.required'=>'Vui lòng không được để trống email',
                'cdv_dantoc.required'=>'Vui lòng không được để trống dân tộc',
                'cdv_trinhdo.required'=>'Vui lòng không được để trống trình độ',
                'cdv_tongiao.required'=>'Vui lòng không được để trống tôn giáo',
                'cdv_ngaythuviec.required'=>'Vui lòng không được để trống ngày vào công đoàn',
                'cdv_ngayvaonganh.required'=>'Vui lòng không được để trống ngày vào ngành',
                'cdv_username.required'=>'Vui lòng không được để trống tên đăng nhập',
                'cdv_username.unique'=>'Tên đăng nhập đã tồn tại',
                'cdv_email.unique'=>'Email đã tồn tại',
                'password.required'=>'Vui lòng không được để trống mật khẩu',
                'password.min'=>'Mật khẩu phải ít nhất 8 kí tự',
                'password.max' => 'Mật khẩu không được quá 50 kí tự',
                'cdv_quyen.required' => 'Vui lòng chọn quyền cho công đoàn viên'
        ];
    }
    
}
