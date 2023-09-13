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
        Schema::create('orders', function (Blueprint $table) {
            // ID PRIMARY KEY
            $table->id();

            // RESTAURANT_ID FOREIGN KEY
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('set null');

            // NAME
            $table->string('name');

            // SURNAME
            $table->string('surname');

            // PHONE_NUMBER
            $table->string('phone_number', 15)->unique();

            // EMAIL
            $table->string('email')->unique();

            // ADDRESS
            $table->string('address');

            // NOTES
            $table->text('notes')->nullable();

            // ORDER_STATUS
            $table->string('order_status');

            // TOTAL
            $table->decimal('total', 8, 2);

            // TIMESTAMPS
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
};
