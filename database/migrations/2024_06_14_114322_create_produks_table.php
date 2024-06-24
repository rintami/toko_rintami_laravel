<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kodetoko');
            $table->unsignedBigInteger('kodekategori');
            $table->string('namaproduk', 100);
            $table->integer('stok', 11)->autoIncrement(false);
            $table->integer('harga', 11)->autoIncrement(false);
            $table->string('daerah', 50);
            $table->string('deskripsi', 100);
            $table->string('gambar1', 255);
            $table->string('gambar2', 255);
            $table->string('gambar3', 255);
            $table->timestamps();

            $table->foreign('kodetoko')->references('id')->on('tokos');
            $table->foreign('kodekategori')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
