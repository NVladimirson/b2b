<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shipping_id');
            $table->unsignedBigInteger('user_id');
            $table->text('public_number');
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['formed','awaits','payed']);
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
        Schema::dropIfExists('orders');
    }
}
