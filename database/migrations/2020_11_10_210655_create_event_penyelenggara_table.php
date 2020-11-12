<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPenyelenggaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_penyelenggara', function (Blueprint $table) {
            $table->foreignId('penyelenggara_id')
                ->nullable()
                ->constrained('penyelenggaras')
                ->onDelete('cascade');
            $table->foreignId('event_id')
                ->nullable()
                ->constrained('events')
                ->onDelete('cascade');
            $table->primary(['penyelenggara_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_penyelenggara');
    }
}
