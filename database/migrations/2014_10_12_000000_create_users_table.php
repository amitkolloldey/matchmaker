<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('rewards')->nullable();;
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable()->default('user.png');
            $table->longText('preferances')->nullable();
            $table->longText('other')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('public_visibility')->default(false);
            $table->integer('role_id')->unsigned()->index()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
