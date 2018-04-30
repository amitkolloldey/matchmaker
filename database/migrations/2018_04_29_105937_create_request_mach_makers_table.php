<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestMachMakersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'request_mach_makers', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'user_id');
			$table->enum( 'request_status', ['pending','success'] );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'request_mach_makers' );
	}
}
