<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            Schema::dropIfExists('likes');
            $table->timestamps();
            $table->id('like_id');
         
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('carsCompany_id')->default(null);
            $table->unsignedBigInteger('hotetPost_id')->default(null);
            $table->unsignedBigInteger('flightCompanyPost_id')->default(null);
            $table->foreign('user_id')->references('userid')->on('User_infos')->onDelete('cascade');       
            $table->foreign('carsCompany_id')->nullable()->references('car_post_id')->on('carscompanyposts')->onDelete('cascade');
            $table->foreign('hotetPost_id')->nullable()->references('Post_Id')->on('posthotels')->onDelete('cascade');
            $table->foreign('flightCompanyPost_id')->nullable()->references('flight_post_id')->on('flightposts')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
