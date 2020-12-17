<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tang');
            $table->integer('id_khu')->unsigned();
            $table->foreign('id_khu')->references('id')->on('Khu');
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
        Schema::dropIfExists('Tang');
    }
}
