<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->date('booking_date');
            $table->string('start_hour');
            $table->string('end_hour');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('association_id')->unsigned()->nullable();
            $table->integer('field_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('association_id')->references('id')->on('associations');
            $table->foreign('field_id')->references('id')->on('fields');
            $table->unique(['field_id', 'booking_date', 'start_hour']);
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
        Schema::dropIfExists('bookings');
    }
}
