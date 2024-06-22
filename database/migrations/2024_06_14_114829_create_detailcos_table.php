<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailcos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kodeco');
            $table->unsignedBigInteger('kodeproduk');
            $table->integer('harga', 11)->autoIncrement(false);
            $table->timestamps();

            $table->foreign('kodeco')->references('id')->on('checkouts');
            $table->foreign('kodeproduk')->references('id')->on('tokos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailcos');
    }
}
