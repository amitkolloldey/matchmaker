<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchedProfilesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'matched_profiles', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'req_profile' );
			$table->integer( 'mac_profile' );
			$table->integer( 'match_maker' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'matched_profiles' );
	}
}
