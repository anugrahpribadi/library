<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('penulis')->nullable();
            $table->string('judul')->nullable();
            // $table->string('penerbit_nama')->references('nama')->on('penerbits')->nullable();
            // $table->string('penulis_nama')->references('nama')->on('penulis')->nullable();
            $table->string('kategori_id')->references('id')->on('kategoris')->nullable();
            $table->text('sinopsis')->nullable();
            $table->string('thn_terbit')->nullable();
            $table->string('jumlah_buku')->nullable();
            $table->string('cover_buku')->nullable();
            $table->string('baca_buku')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bukus');
    }
}
