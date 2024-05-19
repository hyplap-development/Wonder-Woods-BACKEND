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
        if (!Schema::hasTable('productimages')) {
            Schema::create('productimages', function (Blueprint $table) {
                $table->id();
                $table->integer('productId')->nullable();
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('productimages', function (Blueprint $table) {
            if (!Schema::hasColumn('productimages', 'productId')) {
                $table->integer('productId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('productimages', 'image')) {
                $table->string('image')->nullable()->after('productId');
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
        // Schema::dropIfExists('productimages');
    }
};
