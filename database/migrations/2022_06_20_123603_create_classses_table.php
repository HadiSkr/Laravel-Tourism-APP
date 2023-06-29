<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classses', function (Blueprint $table) {
          
            $table->id('class_id');
            $table->string('Booking_type');
            $table->double('cost');
         
            $table->unsignedBigInteger('flight_post_id');
            $table->foreign('flight_post_id')->references('flight_post_id')->on('flightposts')->onDelete('cascade');
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
        Schema::dropIfExists('classses');
    }
}
