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
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->integer('userId')->nullable();
                $table->boolean('default')->default(0);
                $table->string('name')->nullable();
                $table->string('phone')->nullable();
                $table->string('address1')->nullable();
                $table->string('address2')->nullable();
                $table->string('state')->nullable();
                $table->string('city')->nullable();
                $table->string('district')->nullable();
                $table->string('pincode')->nullable();
                $table->string('landmark')->nullable();
                $table->string('type')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('addresses', function (Blueprint $table) {
            if (!Schema::hasColumn('addresses', 'userId')) {
                $table->integer('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('addresses', 'default')) {
                $table->boolean('default')->default(0)->after('userId');
            }
            if (!Schema::hasColumn('addresses', 'name')) {
                $table->string('name')->nullable()->after('default');
            }
            if (!Schema::hasColumn('addresses', 'phone')) {
                $table->string('phone')->nullable()->after('name');
            }
            if (!Schema::hasColumn('addresses', 'address1')) {
                $table->string('address1')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('addresses', 'address2')) {
                $table->string('address2')->nullable()->after('address1');
            }
            if (!Schema::hasColumn('addresses', 'state')) {
                $table->string('state')->nullable()->after('address2');
            }
            if (!Schema::hasColumn('addresses', 'city')) {
                $table->string('city')->nullable()->after('state');
            }
            if (!Schema::hasColumn('addresses', 'district')) {
                $table->string('district')->nullable()->after('city');
            }
            if (!Schema::hasColumn('addresses', 'pincode')) {
                $table->string('pincode')->nullable()->after('district');
            }
            if (!Schema::hasColumn('addresses', 'landmark')) {
                $table->string('landmark')->nullable()->after('pincode');
            }
            if (!Schema::hasColumn('addresses', 'type')) {
                $table->string('type')->nullable()->after('landmark');
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
        // Schema::dropIfExists('addresses');
    }
};
