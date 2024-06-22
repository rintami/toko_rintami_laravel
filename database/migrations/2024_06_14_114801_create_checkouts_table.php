<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kodeproduk');
            $table->unsignedBigInteger('kodepelanggan');
            $table->integer('jumlah', 11)->autoIncrement(false);
            $table->integer('totalharga', 11)->autoIncrement(false);
            $table->date('tanggal');
            $table->string('metodebayar', 30);
            $table->string('status', 50);
            $table->string('buktitf', 255);
            $table->timestamps();

            $table->foreign('kodeproduk')->references('id')->on('tokos');
            $table->foreign('kodepelanggan')->references('id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
