<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_companies', function (Blueprint $table) {
                Schema::dropIfExists('flight_companies');
                $table->timestamps();
                $table->id('flightCompany_id');
                $table->string('Images');
                $table->string('Name');
                $table->string('email');
                $table->string('available_cities');
                $table->string('books_types');
                $table->string('Available_features');
                $table->string('flight_costs_and_offers');
                $table->string('Policies_requirements');
                
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
        Schema::dropIfExists('flight_companies');
    }
}
