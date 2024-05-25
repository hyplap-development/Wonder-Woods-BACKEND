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
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('gsts', function (Blueprint $table) {
            if (!Schema::hasColumn('gsts', 'percent')) {
                $table->string('percent')->nullable()->after('id');
            }
            if (!Schema::hasColumn('gsts', 'status')) {
                $table->boolean('status')->default(1)->after('percent');
            }
            if (!Schema::hasColumn('gsts', 'deleteId')) {
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
        // Schema::dropIfExists('gsts');
    }
};
