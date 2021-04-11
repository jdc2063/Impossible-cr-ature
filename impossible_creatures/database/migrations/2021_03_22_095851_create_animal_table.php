<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_creator_id");
            $table->unsignedBigInteger("species_id");
            $table->unsignedBigInteger("user_owner_id");
            $table->timestamps();

            $table->foreign('user_creator_id')->references('id')->on('users');
            $table->foreign('species_id')->references('id')->on('species');
            $table->foreign('user_owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
