<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Carbon;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

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
                    'cdv_ten' => $value[3],
                    'cdv_ngaysinh' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[4]))->format('Y-m-d'),
                    'cdv_gioitinh' => $value[5],#1 là nam 0 là nữ
                    'cdv_cmnd' => $value[6],
                    'cdv_nguyenquan' => $value[7],
                    'cdv_diachi' => $value[8],
                    'cdv_sdt' => $value[9],
                    'cdv_email' => $value[10],
                    'cdv_dantoc' => $value[11],
                    'cdv_trinhdo' => $value[12],
                    'cdv_tongiao' => $value[13],
                    'cdv_ngaythuviec' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[14]))->format('Y-m-d'),
                    'cdv_ngayvaonganh' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value[15]))->format('Y-m-d'),
                    'cdv_trangthai' => 1,
                    'cdv_username' => $value[16],
                    'password' => bcrypt($value[17]),
                    'cdv_quyen' => 0
                ]);
            }
        }
    }

    public function rules(): array{
        return [
            '0'       =>  'required',
            '1'       =>  'required',
            '2'       =>  'required',
            '3'       =>  'required',
            '4'       =>  'required',
            '5'       =>  'required',
            '6'       =>  'required',
            '7'       =>  'required',
            '8'       =>  'required',
            '9'       =>   'required',
            '10'      =>  ['required',Rule::unique('CongDoanVien', 'cdv_email')],
            '11'      =>  'required',
            '12'      =>  'required',
            '13'      =>  'required',
            '14'      =>  'required',
            '15'      =>  'required',
            '16'      =>  ['required',Rule::unique('CongDoanVien', 'cdv_username')],
            '17'      =>  'required'
        ];
    }


    public function customValidationMessages(){
        return [
                '0.required'    => trans('Không được để trống đơn vị'),
                '1.required'    => trans('Không được để trống chức vụ'),
                '2.required'    => trans('Không được để trống loại nhân viên'),
                '4.required'    => trans('Không được để trống tên công đoàn viên'),
                '5.required'    => trans('Không được để trống ngày sinh'),
                '6.required'    => trans('Không được để trống giới tính'),
                '7.required'    => trans('Không được để trống CMND'),
                '8.required'    => trans('Không được để trống nguyên quán'),
                '9.required'    => trans('Không được để trống địa chỉ'),
                '10.required'   => trans('Không được để trống số điện thoại'),
                '11.required'   => 'Không được để trống email',
                '11.unique'     => 'Email đã được tồn tại vui lòng nhập lại email',
                '12.required'   => trans('Không được để trống dân tộc'),
                '13.required'   => trans('Không được để trống trình độ'),
                '14.required'   => trans('Không được để trống tôn giáo'),
                '15.required'   => trans('Không được để trống ngày thử việc'),
                '16.required'   => trans('Không được để trống ngày vào ngành'),
                '17.required'   => trans('Không được để trống tên đăng nhập'),
            ];
        }
}