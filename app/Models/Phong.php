<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;
    protected $table = 'phong';

    public function tang()
    {
        return $this->belongsTo('App\Models\Tang', 'id_tang', 'id');
    }
    public function giuong()
    {
        return $this->hasMany('App\Models\Giuong', 'id_phong', 'id');

    }
    public function tiendien()
    {
        return $this->hasMany('App\Models\Dien', 'id_phong', 'id');
    }
    public function tiennuoc()
    {
        return $this->hasMany('App\Models\Nuoc', 'id_phong', 'id');
    }
    public function sinhvien()
    {
        return $this->hasManyThrough('App\Models\Sinhvien', 'App\Models\Giuong', 'id_phong', 'id_giuong', 'id');
    }
    public function thue()
    {
        return $this->hasManyThrough('App\Models\Thue', 'App\Models\Giuong', 'id_phong', 'id_giuong', 'id');
    }

}
