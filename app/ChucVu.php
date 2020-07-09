<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table= 'ChucVu';
    protected $primaryKey = 'cv_id';
    protected $guarded      = ['cv_id'];
    protected $fillable = [
        'cv_ten',
        'cv_trangthai',
    ];
}
