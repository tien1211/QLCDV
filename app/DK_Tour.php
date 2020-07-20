<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DK_Tour extends Model
{
    protected $table= 'DK_Tour';
    protected $primaryKey = 'dkt_id';
    protected $guarded      = ['dkt_id'];
    protected $fillable = [
        'cdv_id',
        'tour_id',
        'dkt_soluong'
    ];
    #nhận đăng kí tour từ 1 đoàn viên
    public function CongDoanVien(){
        return $this->belongsTo('App\CongDoanVien','cdv_id','cdv_id');
    }

    #nhận thông tin nhìu người
    public function ThongTinNguoiDK(){
        return $this->hasMany('App\ThongTinNguoiDK','dkt_id','dkt_id');
    }

    #nhận đăng kí tour từ 1 tour
    public function Tour(){
        return $this->belongsTo('App\Tour','tour_id','tour_id');
    }
}
