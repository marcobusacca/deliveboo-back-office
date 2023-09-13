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
        Schema::create('restaurants', function (Blueprint $table) {
            // ID PRIMARY KEY
            $table->id();

            // USER_ID FOREIGN KEY
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // NAME
            $table->string('name');

            // SLUG
            $table->string('slug');

            // ADDRESS
            $table->string('address');

            // VAT
            $table->string('vat', 11);

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
        Schema::dropIfExists('restaurants');
    }
};
