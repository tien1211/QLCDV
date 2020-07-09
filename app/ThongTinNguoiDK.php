<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinNguoiDK extends Model
{
    protected $table= 'ThongTinNguoiDK';
    protected $primaryKey = 'ttndk_id';
    protected $guarded      = ['ttndk_id'];
    protected $fillable = [
        'ttndk_ten',
        'ttndk_gt',
        'ttndk_gt',
        'ttndk_sdt'
    ];
}
