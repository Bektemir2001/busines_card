<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('token')->nullable();
            $table->string('role')->default('user');
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->string('link_to_instagram')->nullable();
            $table->string('link_to_linkedin')->nullable();
            $table->string('link_to_telegram')->nullable();
            $table->string('link_to_youtube')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('subject')->nullable();
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
