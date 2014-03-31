<?php

class CreateDatabaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function($table) {
			$table -> string('id', 25) -> primary();
			$table -> string('password', 60);
			$table -> string('email', 30);
			$table -> timestamps();
			
			$table->engine = 'InnoDB';
		});
		
		Schema::create('restaurants', function($table) {
			$table -> string('id',30) -> primary();
			$table -> string('type', 30) -> nullable();
			$table -> timestamps();
			
			$table->engine = 'InnoDB';
		});
		
		Schema::create('drinks', function($table) {
			$table -> string('id', 30) -> primary();
			$table -> string('type', 30);
			$table -> timestamps();
			
			$table->engine = 'InnoDB';
		});
		
		Schema::create('price_submissions', function($table) {
			$table -> increments('id') -> primary();
			$table -> integer('drink_id') -> unsigned();
			$table -> integer('restaurant_id') -> unsigned();
			$table -> string('user_id', 25);
			$table -> integer('zip');
			$table -> double('price');
			$table -> timestamps();
			
			$table->engine = 'InnoDB';
			
			$table -> foreign('drink_id') -> references ('id') -> on('drinks');
			$table -> foreign('restaurant_id') -> references ('id') -> on('restaurants');
			$table -> foreign('user_id') -> references ('id') -> on('users');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
		Schema::drop('restaurants');
		Schema::drop('drinks');
		Schema::drop('price_submissions');
	}

}
