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
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('image')->nullable();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'image')) {
                $table->string('image')->nullable()->after('id');
            }
            if (!Schema::hasColumn('categories', 'name')) {
                $table->string('name')->nullable()->after('image');
            }
            if (!Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
            if (!Schema::hasColumn('categories', 'status')) {
                $table->boolean('status')->default(1)->after('slug');
            }
            if (!Schema::hasColumn('categories', 'deleteId')) {
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
        // Schema::dropIfExists('categories');
    }
};
