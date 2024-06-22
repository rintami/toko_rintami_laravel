<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailproduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailproduks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kodeproduk');
            $table->string('gambar1', 255);
            $table->string('gambar2', 255);
            $table->string('gambar3', 255);
            $table->timestamps();

            $table->foreign('kodeproduk')->references('id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailproduks');
    }
}
