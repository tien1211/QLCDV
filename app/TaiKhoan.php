<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table= 'TaiKhoan';
    protected $primaryKey = 'tk_tendangnhap';
    
    protected $fillable = [
        'tk_tendangnhap',
        'cdv_id',
        'tk_matkhau',
        'tk_trangthai'
    ];
}
