<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reservations', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->index();
        $table->integer('listing_id')->index();
        $table->integer('payment_amount');
        $table->date('start_date');
        $table->date('end_date');
        // @TODO: Recurring?
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
      Schema::drop('reservations');
    }
}
