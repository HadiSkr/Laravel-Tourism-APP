<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarscompanypostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carscompanyposts', function (Blueprint $table) {
            Schema::dropIfExists('carscompanyposts');
            $table->timestamps();
            $table->id('car_post_id');
            $table->string('image');
            $table->integer('price');
            $table->string('name');
            $table->string('email');
            $table->string('description')->default("car post");
            $table->string('brand');
            $table->integer('model_year');
            $table->string('color');
            $table->integer('num_li');
            $table->integer('num_comm');
          
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
       
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carscompanyposts');
    }
}
