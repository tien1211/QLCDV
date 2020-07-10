<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table= 'ChucVu';
    protected $primaryKey = 'cv_id';
    protected $guarded      = ['cv_id'];
    protected $fillable = [
        'cv_ten',
        'cv_trangthai',
    ];

    #một chức vụ có nhìu công đoàn viên
    public function CongDoanVien (){
        return $this->hasMany('App\CongDoanVien','cv_id','cv_id');
    }
}
