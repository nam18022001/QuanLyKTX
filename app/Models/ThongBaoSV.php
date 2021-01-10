<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBaoSV extends Model
{
    use HasFactory;
    protected $table = 'thongbaosv';

    public function sinhvien()
    {
        # code...
        return $this->belongsTo('App\Models\SinhVien', 'id_sinhvien', 'id');
        
    }
    public function quanly()
    {
        # code...
        return $this->belongsTo('App\Models\User', 'id_quanly', 'id');
        
    }
    public function filesv()
    {
        return $this->hasmany('App\Models\ThongBaoFile', 'id_thongbaosv', 'id');
    }
}
