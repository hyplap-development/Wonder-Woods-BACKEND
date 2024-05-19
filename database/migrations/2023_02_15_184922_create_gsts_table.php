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
        if (!Schema::hasTable('gsts')) {
            Schema::create('gsts', function (Blueprint $table) {
                $table->id();
                $table->string('percent')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('gsts', function (Blueprint $table) {
            if (!Schema::hasColumn('gsts', 'percent')) {
                $table->string('percent')->nullable()->after('id');
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
        // Schema::dropIfExists('gsts');
    }
};
