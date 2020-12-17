<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giuong extends Model
{
    use HasFactory;
    protected $table = 'giuong';

    public function phong()
    {
        # code...
        return $this->belongsTo('App\Models\Phong', 'id_phong', 'id');
    }
    public function sinhvien()
    {
        # code...
        return $this->hasOne('App\Models\SinhVien', 'id_giuong', 'id');
    }
}
