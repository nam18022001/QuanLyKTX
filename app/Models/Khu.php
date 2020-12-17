<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khu extends Model
{
    use HasFactory;
    protected $table = 'khu';

    public function tang()
    {
        # code...
        return $this->hasMany('App\Models\Tang', 'id_khu', 'id');
    }

    public function phong()
    {
        # code...
        return $this->hasManyThrough('App\Models\Phong', 'App\Models\Tang', 'id_khu', 'id_tang', 'id');
    }
}
