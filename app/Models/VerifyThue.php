<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyThue extends Model
{
    use HasFactory;

    protected $table = 'verifythue';
    public function thue()
{
  return $this->belongsTo('App\Models\Thue', 'id_thue', 'id');
}
}
