<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('transaksi_id')->references('kode')->on('transaksis')->nullable();
            $table->string('buku_id')->references('id')->on('bukus')->nullable();
            $table->string('anggota_id')->references('id')->on('anggotas')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('nominal')->nullable();
            $table->SoftDeletes();
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
        Schema::dropIfExists('dendas');
    }
}
