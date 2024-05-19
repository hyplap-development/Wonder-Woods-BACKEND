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
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->integer('userId')->nullable();
                $table->string('addressId')->nullable();
                $table->integer('total')->nullable();
                $table->integer('deliveryCharge')->nullable();
                $table->integer('grandTotal')->nullable();
                $table->string('status')->default('pending');
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('transactions', 'userId')) {
                $table->integer('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('transactions', 'addressId')) {
                $table->string('addressId')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('transactions', 'total')) {
                $table->integer('total')->nullable()->after('addressId');
            }
            if (!Schema::hasColumn('transactions', 'deliveryCharge')) {
                $table->integer('deliveryCharge')->nullable()->after('total');
            }
            if (!Schema::hasColumn('transactions', 'grandTotal')) {
                $table->integer('grandTotal')->nullable()->after('deliveryCharge');
            }
            if (!Schema::hasColumn('transactions', 'status')) {
                $table->string('status')->default('pending')->after('grandTotal');
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
        // Schema::dropIfExists('transactions');
    }
};
