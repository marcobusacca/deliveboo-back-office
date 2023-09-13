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
        Schema::create('products', function (Blueprint $table) {
            // ID PRIMARY KEY
            $table->id();
            
            // RESTAURANT_ID FOREIGN KEY
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('set null');

            // NAME
            $table->string('name');

            // INGREDIENTS
            $table->string('ingredients');

            // PRICE
            $table->decimal('price', 6, 2);

            // DESCRIPTION
            $table->text('description')->nullable();

            // VISIBLE
            $table->boolean('visible');

            // COVER_IMAGE
            $table->string('cover_image')->nullable();

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
        Schema::dropIfExists('products');
    }
};
