<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaiLy extends Model
{
    protected $table= 'DaiLy';
    protected $primaryKey = 'dl_id';
    protected $guarded      = ['dl_id'];
    protected $fillable = [
        'cv_ten',
        'cv_trangthai',
    ];
    public function DL_Tour()
    {
        return $this->belongsTo('App\DL_Tour', 'dl_id', 'dl_id');
    }
}
