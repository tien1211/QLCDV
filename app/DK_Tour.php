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
        'ttndk_id',
        'tour_id',
        'dkt_tour'
    ];
}
