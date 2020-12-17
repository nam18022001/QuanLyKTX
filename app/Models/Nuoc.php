<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nuoc extends Model
{
    use HasFactory;
    protected $table = 'tiennuoc';

    public function phong()
    {
        # code...
        return $this->belongsTo('App\Models\Phong', 'id_phong', 'id');
    }
}
