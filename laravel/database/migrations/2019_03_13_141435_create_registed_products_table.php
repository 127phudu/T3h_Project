<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registed_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('status');
            $table->text('images');
            $table->string('intro');
            $table->string('desc');
            $table->integer('priceFirst');
            $table->integer('price');
            $table->integer('seller_id');
            $table->integer('sell_id')->default(0);
            $table->integer('cat_id');
            $table->dateTime('finish');
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
        Schema::dropIfExists('registed_products');
    }
}
