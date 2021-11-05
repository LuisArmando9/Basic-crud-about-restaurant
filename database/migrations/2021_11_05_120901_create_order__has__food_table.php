<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHasFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_has_food', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("foodId");
            $table->unsignedBigInteger("orderId");
            $table->foreign("orderId")->references("id")->on("orders");
            $table->foreign("foodId")->references("id")->on("food");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order__has__food');
    }
}
