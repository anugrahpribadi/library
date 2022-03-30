<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->integer('buku_id')->references('id')->on('bukus')->nullable();
            $table->integer('anggota_id')->references('id')->on('anggotas')->nullable();
            $table->string('tgl_pinjam')->nullable();
            $table->string('tgl_hrs_kembali')->nullable();
            $table->string('tgl_pengembalian')->nullable();
            $table->enum('status', ['pinjam', 'kembali']);
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
        Schema::dropIfExists('transaksis');
    }
}
