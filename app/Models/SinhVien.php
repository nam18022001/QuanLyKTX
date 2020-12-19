<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinhvien';
    public function giuong()
    {
        # code...
        return $this->belongsTo('App\Models\Giuong', 'id_giuong', 'id');
    }
    public function quanly()
    {
        # code...
        return $this->hasOne('App\Models\User', 'id_sinhvien', 'id');
    }

}
