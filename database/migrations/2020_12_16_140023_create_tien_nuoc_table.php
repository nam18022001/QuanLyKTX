<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTienNuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiennuoc', function (Blueprint $table) {
            $table->increments('id');
            $table->text('soNuocDauThang')->defaultValue('0');
            $table->text('soNuocCuoiThang')->defaultValue('0');
            $table->integer('id_phong')->unsigned();
            $table->integer('phi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiennuoc');
    }
}
