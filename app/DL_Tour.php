<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DL_Tour extends Model
{
    protected $table= 'DL_Tour';
    protected $primaryKey = ['dl_id', 'tour_id'];
    protected $fillable = [
        'cdv_id',
        'tour_id',
    ];
    
    public $incrementing = false;
}
