<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jkel', 30);
            $table->char('telepon', 30);
            $table->string('email', 50);
            $table->string('alamat', 100);
            $table->string('kota', 30);
            $table->string('jabatan', 100);
            $table->integer('gaji', 11)->autoIncrement(false);
            $table->string('pwd', 150);
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
        Schema::dropIfExists('karyawans');
    }
}
