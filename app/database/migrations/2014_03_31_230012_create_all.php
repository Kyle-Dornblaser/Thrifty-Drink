<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAll extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function($table) {
			$table -> engine = 'InnoDB';

			$table -> string('id', 25) -> primary();
			$table -> string('password', 60);
			$table -> string('email', 30);
			$table -> timestamps();
		});

		Schema::create('restaurants', function($table) {
			$table -> engine = 'InnoDB';

			$table -> string('id', 30) -> primary();
			$table -> string('type', 30) -> nullable();
			$table -> timestamps();
		});

		Schema::create('drinks', function($table) {
			$table -> engine = 'InnoDB';

			$table -> string('id', 30) -> primary();
			$table -> string('type', 30);
			$table -> timestamps();
		});

		Schema::create('price_submissions', function($table) {
			$table -> engine = 'InnoDB';

			$table -> increments('id') -> primary();
			$table -> string('drink_id', 30);
			$table -> string('restaurant_id', 30);
			$table -> string('user_id', 25);
			$table -> integer('zip');
			$table -> double('price');
			$table -> timestamps();

			$table -> foreign('drink_id') -> references('id') -> on('drinks') -> onDelete('cascade');
			$table -> foreign('restaurant_id') -> references('id') -> on('restaurants') -> onDelete('cascade');
			$table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('price_submissions');
		Schema::drop('users');
		Schema::drop('restaurants');
		Schema::drop('drinks');
	}

}
