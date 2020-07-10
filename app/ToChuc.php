<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToChuc extends Model
{
    protected $table= 'ToChuc';
    protected $primaryKey = 'tc_id';
    protected $fillable = [
        'tc_ten',
        'tc_trangthai',
        'tc_tructhuoc'
    ];
    #một tổ chức có nhìu công đoàn viên
    public function CongDoanVien (){
        return $this->hasMany('App\CongDoanVien','tc_id','tc_id');
    }
}
