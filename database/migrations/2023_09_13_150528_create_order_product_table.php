<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {

            // ORDER_ID FOREIGN KEY
            $table->unsignedBigInteger('order_id');

            $table->foreign('order_id')->references('id')->on('orders');

            // PRODUCT_ID FOREIGN KEY
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products');

            // QUANTITY
            $table->tinyInteger('quantity');

            // SUB_TOTAL
            $table->decimal('sub_total', 7, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
};
