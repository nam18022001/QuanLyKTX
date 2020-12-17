<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiNgoaiTruongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten');
            $table->string('Lop')->nullable();
            $table->string('MSSV')->nullable();
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
        Schema::dropIfExists('thue');
    }
}
