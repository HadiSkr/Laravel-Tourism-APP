<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
           // Schema::dropIfExists('hotels');
            $table->timestamps();
            $table->id('Hotel_Id');
            $table->string('name');
            $table->string('email');
            $table->string('images');
            $table->string('popular_amenities');
            $table->string('property_amenities');
            $table->string('Room_amenities');
            $table->string('Payments_type');
            $table->string('check_in_out_times');
            $table->string('policies_and_instructions');
            $table->string('children_and_extra_beds');
            $table->string('optional_extras_and_fees');
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
        Schema::dropIfExists('hotels');
    }
}
