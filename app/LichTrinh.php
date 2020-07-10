<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichTrinh extends Model
{
    protected $table= 'LichTrinh';
    protected $primaryKey = 'lt_id';
    protected $guarded      = ['lt_id'];
    protected $fillable = [
        'lt_file',
        'cv_trangthai',
    ];
    #một lịch trình có nhiều tour
    public function Tour (){
        return $this->hasMany('App\Tour','lt_id','lt_id');
    }
}
