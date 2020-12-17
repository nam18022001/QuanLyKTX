<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Phong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phong');
            $table->integer('phi')->nullable();
            $table->integer('id_tang')->unsigned();
            $table->foreign('id_tang')->references('id')->on('Tang');
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
        Schema::dropIfExists('Phong');
    }
}
