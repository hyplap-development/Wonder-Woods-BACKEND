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
            $table->id();
            $table->integer('trxId')->nullable();
            $table->integer('productId')->nullable();
            $table->integer('qty')->nullable();
            $table->string('name')->nullable();
            $table->decimal('discountedPrice')->nullable();
            $table->integer('gst')->nullable();
            $table->integer('deliveryCharge')->nullable();
            $table->integer('colorId')->nullable();
            $table->string('colorName')->nullable();
            $table->string('colorQuality')->nullable();
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
