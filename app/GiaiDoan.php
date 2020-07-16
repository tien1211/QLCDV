<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaiDoan extends Model
{
    protected $table= 'GiaiDoan';
    protected $primaryKey = 'gd_id';
    protected $guarded      = ['gd_id'];
    protected $fillable = [
        'giai_doan',
        'gd_trangthai',
    ];
    #một giai doan có nhiều tour
    public function Tour (){
        return $this->hasMany('App\Tour','gd_id','gd_id');
    }
}
