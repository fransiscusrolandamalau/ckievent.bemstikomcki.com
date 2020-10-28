<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('event_title');
            $table->string('tag')->nullable();
            $table->string('location');
            $table->date('event_start');
            $table->string('start_time')->nullable();
            $table->date('event_ends');
            $table->string('end_time')->nullable();
            $table->string('thumbnail');
            $table->text('content');
            $table->string('slug')->unique();
            $table->string('contact');
            $table->boolean('payment_status')->default(false)->nullable();
            $table->boolean('event_status')->default(false)->nullable();
            $table->string('path_to')->nullable();
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('posts');
    }
}
