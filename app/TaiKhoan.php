<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table= 'TaiKhoan';
    protected $primaryKey = 'tk_tendangnhap';
    
    protected $fillable = [
        'tk_tendangnhap',
        'cdv_id',
        'tk_matkhau',
        'tk_trangthai'
    ];
    #một công đoàn viên có một tài khoản
    public function CongDoanVien(){
        return $this->belongsTo('App\CongDoanVien','cdv_id','cdv_id');
    }
}
