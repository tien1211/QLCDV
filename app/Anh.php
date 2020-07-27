<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anh extends Model
{
    protected $table= 'Anh';
    protected $primaryKey = 'anh_id';
    protected $guarded      = ['anh_id'];
    protected $fillable = [
        'hinhanh',
        'anh_trangthai',
    ];

    public function AnhLichTrinh()
    {
        return $this->hasMany('App\AnhLichTrinh', 'anh_id', 'anh_id');
    }
    
}
