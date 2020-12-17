<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SinhVien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten');
            $table->string('Lop');
            $table->string('MSSV');
            $table->string('CMND');
            $table->integer('id_giuong')->nullable();
            $table->integer('SDT');
            $table->string('Email');
            $table->string('Password');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('verified')->nullable()->defaultFalse();
            $table->rememberToken();
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
        Schema::dropIfExists('SinhVien');
    }
}
