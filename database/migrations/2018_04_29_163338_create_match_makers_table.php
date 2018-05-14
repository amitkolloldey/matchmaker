<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchMakersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'match_makers', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name', 50 );
			$table->string( 'email', 50 )->unique();
			$table->string( 'password', 200 );
			$table->string( 'image', 200 )->nullable();
			$table->smallInteger( 'status' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'match_makers' );
	}
}
