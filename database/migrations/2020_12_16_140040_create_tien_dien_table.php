<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTienDienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendien', function (Blueprint $table) {
            $table->increments('id');
            $table->text('soDienDauThang')->defaultValue('0');
            $table->text('soDienCuoiThang')->defaultValue('0');
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
        Schema::dropIfExists('tiendien');
    }
}
