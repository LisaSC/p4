<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->string('subject');
			$table->text('comment');
			
			# Define foreign keys...
			# none needed

		});
		
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->boolean('remember_token');
			$table->string('password');
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
		Schema::drop('comments');
		Schema::drop('users');
	}

}
