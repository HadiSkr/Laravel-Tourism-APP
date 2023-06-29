<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->timestamps();
            $table->id('follow_id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('user_id')->references('userid')->on('User_infos')->onDelete('cascade');       
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
        Schema::dropIfExists('follows');
    }
}
