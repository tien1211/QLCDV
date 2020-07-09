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
}
