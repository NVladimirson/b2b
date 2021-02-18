<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_option_id');
            $table->enum('language', ['en','ru']);
            $table->text('name');
            $table->foreign('product_option_id')->references('id')->on('product_options');
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
        Schema::dropIfExists('product_option_names');
    }
}
