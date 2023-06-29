<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_infos', function (Blueprint $table) {
            Schema::dropIfExists('User_infos');
            $table->timestamps();
            $table->id('userid');
            $table->string('name');
            $table->string('phone');
            $table->string('password');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('gender');
            $table->date('birthdate');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
