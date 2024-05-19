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
        if (!Schema::hasTable('carts')) {
            Schema::create('carts', function (Blueprint $table) {
                $table->id();
                $table->integer('userId')->nullable();
                $table->integer('productId')->nullable();
                $table->integer('price')->nullable();
                $table->integer('qty')->nullable();
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('carts', function (Blueprint $table) {
            if (!Schema::hasColumn('carts', 'userId')) {
                $table->integer('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('carts', 'productId')) {
                $table->integer('productId')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('carts', 'price')) {
                $table->integer('price')->nullable()->after('productId');
            }
            if (!Schema::hasColumn('carts', 'qty')) {
                $table->integer('qty')->nullable()->after('price');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('carts');
    }
};
