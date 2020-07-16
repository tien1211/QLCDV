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
    ];
    #một đơn vị có nhiều công đoàn viên
    public function CongDoanVien (){
        return $this->hasMany('App\CongDoanVien','dv_id','dv_id');
    }
}
