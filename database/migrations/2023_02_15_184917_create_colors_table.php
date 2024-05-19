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
        if (!Schema::hasTable('colors')) {
            Schema::create('colors', function (Blueprint $table) {
                $table->id();
                $table->string('image')->nullable();
                $table->string('name')->nullable();
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('colors', function (Blueprint $table) {
            if (!Schema::hasColumn('colors', 'image')) {
                $table->string('image')->nullable()->after('id');
            }
            if (!Schema::hasColumn('colors', 'name')) {
                $table->string('name')->nullable()->after('image');
            }
            if (!Schema::hasColumn('colors', 'status')) {
                $table->boolean('status')->default(1)->after('name');
            }
            if (!Schema::hasColumn('colors', 'deleteId')) {
                $table->boolean('deleteId')->default(0)->after('status');
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
        // Schema::dropIfExists('colors');
    }
};
