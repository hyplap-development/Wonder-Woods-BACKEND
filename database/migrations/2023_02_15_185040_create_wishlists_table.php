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
        if (!Schema::hasTable('wishlists')) {
            Schema::create('wishlists', function (Blueprint $table) {
                $table->id();
                $table->integer('userId')->nullable();
                $table->integer('productId')->nullable();
                $table->integer('price')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('wishlists', function (Blueprint $table) {
            if (!Schema::hasColumn('wishlists', 'userId')) {
                $table->integer('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('wishlists', 'productId')) {
                $table->integer('productId')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('wishlists', 'price')) {
                $table->integer('price')->nullable()->after('productId');
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
        // Schema::dropIfExists('wishlists');
    }
};
