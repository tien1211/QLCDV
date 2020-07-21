<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhTrangThuPhi extends Model
{
    protected $table= 'GiaiDoan';
    protected $primaryKey = 'tttp_id';
    protected $guarded      = ['tttp_id'];
    protected $fillable = [
        'tinh_trang',
    ];
    #một tình trạng thu phí có nhiều đăng ký tour
    public function DK_Tour (){
        return $this->hasMany('App\DK_Tour','tttp_id','tttp_id');
    }
}
