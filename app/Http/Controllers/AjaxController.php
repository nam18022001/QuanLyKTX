<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khu;
use App\Models\Tang;
use App\Models\Phong;
use App\Models\Giuong;

class AjaxController extends Controller
{
    //
    public function khu($id_khu)
    {
        # code...
        $tang = Tang::where('id_khu', $id_khu)->get();

            foreach($tang as $value){
                echo "<option class='select-option' value='".$value->id."'>".$value->tang."</option>";
        }
    }
        public function tang($id_tang)
        {
            # code...
            $phong = Phong::where('id_tang', $id_tang)->get();
                foreach($phong as $value){
                    $giuong = Giuong::where([
                        ['id_phong', $value->id],
                        ['hoatdong', 0],
                    ]
                    )->count();
                    
                    echo "<option class='select-option' value='".$value->id."'>".$value->phong."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Giường còn lại ".$giuong."</small></option>";
            }
        }
        public function phong($id_phong)
        {
            # code...
            $Giuong = Giuong::where([
                ['id_phong', $id_phong],
                ['hoatdong', 0]
                ])->get();
                foreach($Giuong as $value){
                    echo "<option class='select-option' value='".$value->id."'>".$value->giuong."</option>";
            }
        }
}