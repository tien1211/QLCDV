<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DL_Tour extends Model
{
    protected $table= 'DL_Tour';
    protected $primaryKey = ['dl_id', 'tour_id'];
    protected $fillable = [
        'dl_id',
        'tour_id',
    ];
    
    public $incrementing = false;


    public function DaiLy()
    {
        return $this->hasMany('App\DaiLy', 'dl_id', 'dl_id');
    }
    public function Tour()
    {
        return $this->hasMany('App\Tour', 'tour_id', 'tour_id');
    }
}
