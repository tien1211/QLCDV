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
        'tour_phuongtien',
        'tour_diadiem',
        'tour_trongnam',
        'tour_trangthai'   
    ];

    protected $dates        = ['tour_handk','tour_ngaybd','tour_ngaykt'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    #một tour có một lịch trình
    public function LichTrinh()
    {
        return $this->belongsTo('App\LichTrinh', 'lt_id', 'lt_id');
    }
    # một tour có nhìu đktour
    public function DK_Tour()
    {
        return $this->hasMany('App\DK_Tour', 'tour_id', 'tour_id');
    }

    public function DL_Tour()
    {
        return $this->belongsTo('App\DK_Tour', 'tour_id', 'tour_id');
    }
}
