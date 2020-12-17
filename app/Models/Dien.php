<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dien extends Model
{
    use HasFactory;
    protected $table = 'tiendien';

    public function phong()
    {
        return $this->belongsTo('App\Models\Phong', 'id_phong', 'id');
    }
}
