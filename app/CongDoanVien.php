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





    #một công đoàn viên chỉ có 1 chức vụ
    public function ChucVu(){
        return $this->belongsTo('App\ChucVu','cv_id','cv_id');
    }

    #một công đoàn viên chỉ có 1 tổ chức
    public function ToChuc(){
        return $this->belongsTo('App\ToChuc','tc_id','tc_id');
    }

    #một công đoàn viên chỉ có 1 loại nhân viên
    public function LoaiNhanVien(){
        return $this->belongsTo('App\LoaiNhanVien','lnv_id','lnv_id');
    }

    #một công đoàn viên chỉ có 1 mức hổ trợ
    public function MucHoTro(){
        return $this->belongsTo('App\MucHoTro','mht_id','mht_id');
    }

    #một công đoàn viên có 1 tài khoản
    public function TaiKhoan()
    {
        return $this->hasOne('App\TaiKhoan','cdv_id','cdv_id');
    }


    #một Công đoàn viên có thể đăng ký nhiều tour
    public function DKTour (){
        return $this->hasMany('App\DK_Tour','cdv_id','cdv_id');
    }





    #nhìu
    /*một phòng có nhiều commet
    public function comment (){
        return $this->hasMany('App\comment','p_id','p_id');// agurement 1: model, arg2: foreignkey of comments on comment, arg3 is primiryKey on users
    }*/
    #lấy 1
    /*
    một cmt chỉ ở 1 phòng
    public function phong(){
        return $this->belongsTo('App\phong','p_id','p_id');
    }
    */
    
    #một
    /* 
    
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }*/
}
