<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Carbon;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class CongDoanVienImport implements ToCollection,WithValidation
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

    public function rules(): array{
        return [
            '0'       =>  'required',
            '1'       =>  'required',
            '2'       =>  'required',
            '4'       =>  'required',
            '5'       =>  'required',
            '6'       =>  'required',
            '7'       =>  ['required','min:9','max:9'],
            '8'       =>  'required',
            '9'       =>  'required',
            '10'      =>  ['required','min:9','max:9'],
            '11'      =>  ['required', Rule::unique('CongDoanVien', 'cdv_email')],
            '12'      =>  'required',
            '13'      =>  'required',
            '14'      =>  'required',
            '15'      =>  'required',
            '16'      =>  'required',
            '17'      =>  ['required',Rule::unique('CongDoanVien', 'cdv_email')],
            '18'      =>  ['required','min:8','max:50'],
            '19'      =>  'required',
            
        ];
    }


    public function customValidationMessages(){
        return [
                '0.required'    => trans('Không được để trống đơn vị'),
                '1.required'    => trans('Không được để trống chức vụ'),
                '2.required'    => trans('Không được để trống loại nhân viên'),
                '4.required'    => trans('Không được để trống tên công đoàn viên'),
                '5.required'    => trans('Không được để trống ngày sinh'),
                '5.date'        => trans('Vui lòng nhập đúng định dạng ngày sinh'),
                '6.required'    => trans('Không được để trống giới tính'),
                '7.required'    => trans('Không được để trống CMND'),
                '7.min'         => trans('Vui lòng nhập đủ 9 kí tự cmnd'),
                '7.max'         => trans('Vui lòng nhập đủ 9 kí tự cmnd'),
                '8.required'    => trans('Không được để trống nguyên quán'),
                '9.required'    => trans('Không được để trống địa chỉ'),
                '10.required'   => trans('Không được để trống số điện thoại'),
                '10.min'        => trans('Vui lòng nhập đủ 9 kí tự sdt'),
                '10.max'        => trans('Vui lòng nhập đủ 9 kí tự sdt'),
                '11.required'   => 'Không được để trống email',
                '11.unique'     => 'Email đã được tồn tại vui lòng nhập lại email',
                '12.required'   => trans('Không được để trống dân tộc'),
                '13.required'   => trans('Không được để trống trình độ'),
                '14.required'   => trans('Không được để trống tôn giáo'),
                '15.required'   => trans('Không được để trống ngày thử việc'),
                '16.required'   => trans('Không được để trống ngày vào ngành'),
                '17.required'   => trans('Không được để trống tên đăng nhập'),
                '17.unique'     => trans('Tên đăng nhập đã được tồn tại'),
                '18.required'   => trans('Vui lòng không được để trống mật khẩu'),
                '18.min'        => trans('Mật khẩu phải ít nhất 8 kí tự'),
                '18.max'        => trans('Mật khẩu phải tối đa 50 kí tự'),
                '19.required'   => trans('Vui lòng không được để trống quyền')
            ];
        }
}