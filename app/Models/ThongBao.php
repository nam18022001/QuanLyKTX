<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'thongbao';

    public function sinhvien()
    {
        return $this->belongsTo('App\Models\SinhVien', 'id_sinhvien', 'id');
    }
    public function file()
    {
        # code...
        return $this->hasMany('App\Models\ThongBaoFile', 'id_thongbao', 'id');
    }
}
