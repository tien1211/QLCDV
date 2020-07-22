<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CongDoanVien extends Authenticatable
{
    protected $table= 'CongDoanVien';
    protected $primaryKey = 'cdv_id';
    protected $guarded      = ['cdv_id'];
    protected $fillable = [
        'dv_id',
        'cv_id',
        'lnv_id',
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
        'cdv_ngaythuviec',
        'cdv_ngayvaonganh',
        'cdv_trangthai',
        'cdv_hinhanh',
        'cdv_username',
        'password',
        'cdv_quyen' 
    ];

    protected $dates        = ['ngaythuviec','ngayvaonganh'];
    protected $dateFormat   = 'Y-m-d';

    #một công đoàn viên chỉ có 1 chức vụ
    public function ChucVu(){
        return $this->belongsTo('App\ChucVu','cv_id','cv_id');
    }

    #một công đoàn viên chỉ có 1 tổ chức
    public function DonVi(){
        return $this->belongsTo('App\DonVi','dv_id','dv_id');
    }

    #một công đoàn viên chỉ có 1 loại nhân viên
    public function LoaiNhanVien(){
        return $this->belongsTo('App\LoaiNhanVien','lnv_id','lnv_id');
    }

    #một công đoàn viên chỉ có 1 mức hổ trợ
    public function MucHoTro(){
        return $this->belongsTo('App\MucHoTro','mht_id','mht_id');
    }


    #một Công đoàn viên có thể đăng ký nhiều tour
    public function DKTour (){
        return $this->hasMany('App\DK_Tour','cdv_id','cdv_id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }



   
}
