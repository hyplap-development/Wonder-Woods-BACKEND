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
        if (!Schema::hasTable('inventories')) {
            Schema::create('inventories', function (Blueprint $table) {
                $table->id();
                $table->integer('productId')->nullable();
                $table->integer('qty')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('inventories', function (Blueprint $table) {
            if (!Schema::hasColumn('inventories', 'productId')) {
                $table->integer('productId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('inventories', 'qty')) {
                $table->integer('qty')->nullable()->after('productId');
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
        // Schema::dropIfExists('inventories');
    }
};
