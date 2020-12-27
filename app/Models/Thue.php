<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Thue extends Model implements AuthenticatableContract
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = 'thue';

    public function giuong()
    {
        return $this->belongsTo('App\Models\Giuong', 'id_giuong', 'id');
    }
    public function verifythue()
    {
        # code...
        return $this->hasOne('App\Models\VerifyThue', 'id_thue', 'id');
    }
}
