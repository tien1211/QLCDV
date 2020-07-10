<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MucHoTro extends Model
{
    protected $table= 'MucHoTro';
    protected $primaryKey = 'mht_id';
    protected $guarded      = ['mht_id'];
    protected $fillable = [
        'mht_nam',
        'mht_phihotro',
        'mht_trangthai'
    ];

    #một mức hổ trợ có nhìu công đoàn viên
    public function CongDoanVien (){
        return $this->hasMany('App\CongDoanVien','mht_id','mht_id');
    }
}
