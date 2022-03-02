<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('nama_wisata')->unique();
            $table->string('slug');
            $table->string('lokasi');
            $table->text('deskripsi_wisata');
            $table->text('harga_tiket');
            $table->string('cover')->nullable();
            $table->string('status' )->nullable();
            $table->string('embed_map' )->nullable();
            $table->foreign('id_kategori')->references('id')->on('kategoris');
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
        Schema::dropIfExists('wisatas');
    }
}
