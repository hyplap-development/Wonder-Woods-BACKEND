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
            $table->id();
            $table->integer('categoryId')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->decimal('mrp')->nullable();
            $table->decimal('discountedPrice')->nullable();
            $table->integer('gst')->nullable();
            $table->integer('deliveryCharge')->nullable();
            $table->longText('metaKeywords')->nullable();
            $table->string('metaTitle')->nullable();
            $table->longText('metaDescription')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('deleteId')->default(0);
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
