<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Giuong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Giuong');
            $table->integer('phi')->nullable();
            $table->integer('demphi')->nullable();
            $table->integer('hoatdong')->nullable();
            $table->integer('id_phong')->unsigned();
            $table->foreign('id_phong')->references('id')->on('Phong');
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
        Schema::dropIfExists('Giuong');
    }
}
