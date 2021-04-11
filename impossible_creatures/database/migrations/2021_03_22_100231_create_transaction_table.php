<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("price");
            $table->string("sale_at");
            $table->string("purchase_at");
            $table->unsignedBigInteger("animal_sold_id");
            $table->unsignedBigInteger("user_saller_id");
            $table->unsignedBigInteger("buyer_user_id");
            $table->timestamps();

            $table->foreign('animal_sold_id')->references('id')->on('animals');
            $table->foreign('user_saller_id')->references('id')->on('users');
            $table->foreign('buyer_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
