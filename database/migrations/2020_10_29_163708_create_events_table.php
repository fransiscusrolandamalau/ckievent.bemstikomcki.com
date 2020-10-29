<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('event_title', 191);
            $table->string('slug', 191)->unique();
            $table->string('excerpt')->nullable();
            $table->string('location', 100);
            $table->date('event_start')->nullable();
            $table->time('start_time')->nullable();
            $table->date('event_ends')->nullable();
            $table->time('end_time')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->text('terms_and_conditions')->nullable();
            $table->string('contact_person', 50)->nullable();
            $table->boolean('payment_status')->default(false);
            $table->boolean('event_status')->default(false);
            $table->string('path_to', 150)->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreignId('user_id');
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
