<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table= 'Tour';
    protected $primaryKey = 'tour_id';
    protected $fillable = [
        'lt_id',
        'tour_handk',
        'tour_ngaybd',
        'tour_ngaykt',
        'tour_chiphi',
        'tour_soluong',
        'gd_id',
        'tour_daily',
        'tour_trangthai'   
    ];

    protected $dates = ['tour_handk','tour_ngaybd','tour_ngaykt'];
    protected $dateFormat   = 'Y-m-d';
    #một tour có một lịch trình
    public function LichTrinh()
    {
        return $this->belongsTo('App\LichTrinh', 'lt_id', 'lt_id');
    }
    #một tour có một giai doan
    public function GiaiDoan()
    {
        return $this->belongsTo('App\GiaiDoan', 'gd_id', 'gd_id');
    }
    # một tour có nhìu đktour
    public function DK_Tour()
    {
        return $this->hasMany('App\DK_Tour', 'tour_id', 'tour_id');
    }
}
