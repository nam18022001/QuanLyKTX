<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifySV extends Model
{
    use HasFactory;

    protected $table = 'verifysv';
    public function SinhVien()
{
  return $this->belongsTo('App\Models\SinhVien', 'id_sv', 'id');
}
}
