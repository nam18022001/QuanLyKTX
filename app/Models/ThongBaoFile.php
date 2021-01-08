<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBaoFile extends Model
{
    use HasFactory;
    protected $table = 'thongbaofile';

    public function thongbao()
    {
        return $this->belongsTo('App\Models\ThongBao', 'id_thongbao', 'id');
    }
    public function thongbaosv()
    {
        return $this->belongsTo('App\Models\ThongBaoSV', 'id_thongbaosv', 'id');
    }
}
