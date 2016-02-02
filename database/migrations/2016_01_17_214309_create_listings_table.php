<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('listings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->index();
          $table->string('title');
          $table->string('address');
          $table->string('type');
          $table->string('event_type_accommodations');
          $table->string('space_type');
          $table->text('features');
          $table->string('size');
          $table->string('minium_lease_days');
          $table->string('maximum_lease_days');
          $table->string('starting_daily_price');
          $table->date('available_start_date');
          $table->date('available_end_date');
          // @TODO: blackout dates
          $table->text('description');
          $table->boolean('private');
          $table->timestamps();
      });
      DB::statement('ALTER TABLE listings ADD coords POINT' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('listings');
    }
}
