<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestuarantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restuarants', function (Blueprint $table) {
            Schema::dropIfExists('restuarants');
            $table->timestamps();
            $table->id('Restaurant_id');
            $table->string('name');
            $table->string('email');
            $table->string('image');
            $table->string('dietary_option');
            $table->string('Cuisine');
            $table->string('Serving');
            $table->string('features');
            $table->string('delivery_options');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade');
           
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
        Schema::dropIfExists('restuarants');
    }
}
