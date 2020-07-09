<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNhanVien extends Model
{
    protected $table= 'LoaiNhanVien';
    protected $primaryKey = 'lnv_id';
    protected $guarded      = ['lnv_id'];
    protected $fillable = [
        'lnv_ten',
        'lnv_trangthai',
    ];
}
