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
        'tour_daily',
        'tour_trongnam',
        'tour_trangthai'   
    ];

    protected $dates        = ['ngayvaocd','ngayvaonganh'];
    protected $dateFormat   = 'Y-m-d';
}
