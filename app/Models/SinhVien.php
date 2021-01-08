<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class SinhVien extends Model implements AuthenticatableContract
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = 'sinhvien';
   
    public function giuong()
    {
        # code...
        return $this->belongsTo('App\Models\Giuong', 'id_giuong', 'id');
    }
    public function thongbao()
    {
        return $this->hasMany('App\Models\ThongBao', 'id_sinhvien', 'id');
    }

    public function verifysv()
    {
        # code...
        return $this->hasOne('App\Models\VerifySV', 'id_sv', 'id');
    }
    public function thongbaosv()
    {
        return $this->hasMany('App\Models\ThongBaoSV', 'id_sinhvien', 'id');
    }
}
