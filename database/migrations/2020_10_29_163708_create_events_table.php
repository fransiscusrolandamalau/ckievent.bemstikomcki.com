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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreignId('user_id');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->time('mulai_jam')->nullable();
            $table->time('selesai_jam')->nullable();
            $table->enum('lokasi', ['Online', 'Offline']);
            $table->string('nama_tempat')->nullable();
            $table->string('url_maps')->nullable();
            $table->string('url_streaming');
            $table->enum('kategori_tiket', ['Berbayar', 'Gratis']);
            $table->string('nama_tiket')->nullable();
            $table->string('jumlah_tiket')->nullable();
            $table->string('harga')->nullable();
            $table->date('tanggal_mulai_penjualan')->nullable();
            $table->date('tanggal_berakhir_penjualan')->nullable();
            $table->time('mulai_jam_penjualan')->nullable();
            $table->time('selesai_jam_penjualan')->nullable();
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
