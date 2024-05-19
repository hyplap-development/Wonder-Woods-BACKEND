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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->integer('stateId')->nullable();
            $table->string('state')->nullable();
            $table->integer('cityId')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('total')->nullable();
            $table->string('gst')->nullable();
            $table->string('deliveryCharge')->nullable();
            $table->string('grandTotal')->nullable();
            $table->string('orderStatus')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
