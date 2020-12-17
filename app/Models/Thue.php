<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thue extends Model
{
    use HasFactory;
    protected $table = 'thue';

    public function giuong()
    {
        return $this->belongsTo('App\Models\Giuong', 'id_giuong', 'id');
    }
}
