<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnhLichTrinh extends Model
{
    protected $table= 'anhlichtrinh';
    protected $primaryKey = 'alt_id';
    protected $guarded      = ['alt_id'];
    protected $fillable = [
        'anh_id',
        'lt_id',
    ];

    public function LichTrinh(){
        return $this->belongsTo('App\LichTrinh','lt_id','lt_id');
    }

    public function Anh(){
        return $this->belongsTo('App\Anh','anh_id','anh_id');
    }
}
