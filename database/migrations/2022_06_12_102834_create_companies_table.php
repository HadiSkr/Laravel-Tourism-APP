<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->timestamps();
            $table->id('company_id');
            $table->string('type');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Commercial_record');
            $table->string('phone');
            $table->rememberToken();
            $table->integer('five_stars');
            $table->integer('num_folows');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
