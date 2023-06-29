<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            Schema::dropIfExists('comments');
            $table->timestamps();
            $table->id('comment_id');

            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('carsCompany_id')->default(null);
            $table->unsignedBigInteger('hotetPost_id')->default(null);
            $table->unsignedBigInteger('flightCompanyPost_id')->default(null);
            $table->foreign('user_id')->references('userid')->on('User_infos');
            $table->foreign('carsCompany_id')->nullable()->references('car_post_id')->on('carscompanyposts');
            $table->foreign('hotetPost_id')->nullable()->references('Post_Id')->on('posthotels');
            $table->foreign('flightCompanyPost_id')->nullable()->references('flight_post_id')->on('flightposts');
            $table->string('comm');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
