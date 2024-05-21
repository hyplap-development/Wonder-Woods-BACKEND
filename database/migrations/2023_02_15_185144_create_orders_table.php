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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->integer('trxId')->nullable();
                $table->integer('productId')->nullable();
                $table->integer('price')->nullable();
                $table->integer('qty')->nullable();
                $table->integer('total')->nullable();
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'trxId')) {
                $table->integer('trxId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('orders', 'productId')) {
                $table->integer('productId')->nullable()->after('trxId');
            }
            if (!Schema::hasColumn('orders', 'price')) {
                $table->integer('price')->nullable()->after('productId');
            }
            if (!Schema::hasColumn('orders', 'qty')) {
                $table->integer('qty')->nullable()->after('price');
            }
            if (!Schema::hasColumn('orders', 'total')) {
                $table->integer('total')->nullable()->after('qty');
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
        // Schema::dropIfExists('orders');
    }
};
