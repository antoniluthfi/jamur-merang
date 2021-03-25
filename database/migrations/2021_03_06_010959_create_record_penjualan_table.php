<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('area');
            $table->foreignId('id_kategori_pembelian');
            $table->integer('kunjungan');
            $table->integer('kunjungan_efektif');
            $table->double('nominal', 15, 0)->nullable();
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
        Schema::dropIfExists('record_penjualan');
    }
}
