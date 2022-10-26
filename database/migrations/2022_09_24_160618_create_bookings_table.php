<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('time_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('date');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->index('user_id', 'user_book_idx');
            $table->index('time_id', 'time_book_idx');

            $table->foreign('user_id', 'user_book_fk')->on('users')->references('id');
            $table->foreign('time_id', 'time_book_fk')->on('working_times')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
