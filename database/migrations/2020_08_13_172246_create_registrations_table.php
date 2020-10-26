<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('posts')->onDelete('cascade');
			$table->string('full_name');
			$table->string('email');
			$table->string('phone_number');
			$table->string('event_name');
			$table->string('status')->nullable();
			$table->string('instansi')->nullable();
			$table->string('nim');
			$table->string('kelas')->nullable();
			$table->string('semester')->nullable();
			$table->string('info');
			$table->boolean('payment_confirmation')->default(false)->nullable();
			$table->string('payment_upload')->nullable();
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
		Schema::dropIfExists('registrations');
	}
}
