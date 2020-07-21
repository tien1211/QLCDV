<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnhTour extends Model
{
    protected $table= 'Anh_Tour';
    protected $primaryKey = 'at_id';
    protected $guarded      = ['at_id'];
    protected $fillable = [
        'lt_id',
        'at_hinhanh',
        'at_trangthai'
    ];
    #một tình trạng thu phí có nhiều đăng ký tour
    
}
