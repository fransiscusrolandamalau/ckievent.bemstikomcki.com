<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_peserta', function (Blueprint $table) {
            $table->foreignId('peserta_id')
                ->nullable()
                ->constrained('pesertas')
                ->onDelete('cascade');
            $table->foreignId('event_id')
                ->nullable()
                ->constrained('events')
                ->onDelete('cascade');
            $table->primary(['peserta_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_peserta');
    }
}
