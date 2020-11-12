<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('banner')->nullable();
            $table->string('nama_event');
            $table->string('slug')->unique();
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->time('mulai_jam');
            $table->time('selesai_jam');
            $table->boolean('lokasi')->default(false);
            $table->string('nama_tempat')->nullable();
            $table->string('url_maps')->nullable();
            $table->string('url_streaming')->nullable();
            $table->boolean('kategori_tiket')->default(false);
            $table->string('nama_tiket');
            $table->string('jumlah_tiket');
            $table->string('harga')->nullable();
            $table->date('tanggal_mulai_penjualan');
            $table->date('tanggal_berakhir_penjualan');
            $table->time('mulai_jam_penjualan');
            $table->time('selesai_jam_penjualan');
            $table->text('deskripsi_event');
            $table->text('syarat_ketentuan')->nullable();
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('events');
    }
}
