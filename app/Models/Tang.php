<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tang extends Model
{
    use HasFactory;
    protected $table = 'tang';

    public function khu()
    {
        return $this->belongsTo('App\Models\Khu', 'id_khu', 'id');
    }
    public function phong()
    {
        return $this->hasMany('App\Models\Phong', 'id_tang', 'id');
    }
}
