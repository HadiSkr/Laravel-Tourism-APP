<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosthotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posthotels', function (Blueprint $table) {
            Schema::dropIfExists('posthotels');
            $table->timestamps();
            $table->id('Post_Id');
            $table->string('image');
            $table->string('email');
            $table->string('room_size');
            $table->string('View');
            $table->integer('price');
            $table->integer('number_of_beds');
            $table->string('types_of_bed');
            $table->string('policies_and_instructions');
            $table->string('entertainment');
            $table->string('Food_and_Drink');
            $table->string('extra_options_fees');
            $table->string('More');
            $table->integer('num_li');
            $table->integer('num_comm');
            $table->unsignedBigInteger('Hotel_Id');
            $table->foreign('Hotel_Id')->references('Hotel_Id')->on('hotels')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posthotels');
    }
}
