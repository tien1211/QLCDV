<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongDoanVien extends Model
{
    protected $table= 'CongDoanVien';
    protected $primaryKey = 'cdv_id';
    protected $guarded      = ['cdv_id'];
    protected $fillable = [
        'tc_id',
        'cv_id',
        'lnv_id',
        'mht_id',
        'cdv_ten',
        'cdv_ngaysinh',
        'cdv_gioitinh',
        'cdv_cmnd',
        'cdv_nguyenquan',
        'cdv_diachi',
        'cdv_sdt',
        'cdv_email',
        'cdv_dantoc',
        'cdv_trinhdo',
        'cdv_tongiao',
        'cdv_ngayvaocd',
        'cdv_ngayvaonganh',
        'cdv_trangthai',
        'cdv_hinhanh'  
    ];

    protected $dates        = ['ngayvaocd','ngayvaonganh'];
    protected $dateFormat   = 'Y-m-d';
}
