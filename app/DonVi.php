<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table= 'DonVi';
    protected $primaryKey = 'dv_id';
    protected $fillable = [
        'dv_ten',
        'dv_trangthai',
        'dv_mota',
        'dv_tructhuoc_id',
    ];
    #một đơn vị có nhiều công đoàn viên
    public function CongDoanVien (){
        return $this->hasMany('App\CongDoanVien','dv_id','dv_id');
    }
    #một đơn vị trưc thuộc một đơn vị khác
    public function DonViTrucThuoc(){
        return $this->belongsTo('App\DonVi','dv_tructhuoc_id','dv_id');
    }
    #một đơn vị có nhiều đơn vị khác trực thuộc
    public function DonVi(){
        return$this->hasMany('App\DonVi','dv_id','dv_tructhuoc_id');
    }
}
