<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinNguoiDK extends Model
{
    protected $table= 'ThongTinNguoiDK';
    protected $primaryKey = 'ttndk_id';
    protected $guarded      = ['ttndk_id'];
    protected $fillable = [
        'dkt_id',
        'ttndk_ten',
        'ttndk_gt',
        'ttndk_tuoi',
        'ttndk_cv',
        'ttndk_trangthai'
    ];

    #một thông tin người đăng kí có thể đăng ký nhiều dk_tour
    public function DK_Tour()
    {
    return $this->belongsTo('App\DK_Tour', 'dkt_id', 'dkt_id');
    }
}
