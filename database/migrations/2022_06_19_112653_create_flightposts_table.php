<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flightposts', function (Blueprint $table) {
                Schema::dropIfExists('flightposts');
                $table->timestamps();
                $table->id('flight_post_id');
                $table->string('images');
                $table->string('email');
                $table->string('flying_from');
                $table->string('flying_to');
                $table->date('dates');
                $table->integer('num_travellers')->default(1);
                $table->date('Timr_to_arrive');
                $table->integer('num_li');
                $table->integer('num_comm');

                $table->unsignedBigInteger('flightCompany_id');
          
                $table->foreign('flightCompany_id')->references('flightCompany_id')->on('flight_companies')->onDelete('cascade');
              
        
        
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flightposts');
    }
}
