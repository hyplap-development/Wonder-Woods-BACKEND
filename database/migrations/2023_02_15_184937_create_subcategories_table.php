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
        if (!Schema::hasTable('subcategories')) {
            Schema::create('subcategories', function (Blueprint $table) {
                $table->id();
                $table->string('image')->nullable();
                $table->integer('categoryId')->nullable();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('subcategories', function (Blueprint $table) {
            if (!Schema::hasColumn('subcategories', 'image')) {
                $table->string('image')->nullable()->after('id');
            }
            if (!Schema::hasColumn('subcategories', 'categoryId')) {
                $table->integer('categoryId')->nullable()->after('image');
            }
            if (!Schema::hasColumn('subcategories', 'name')) {
                $table->string('name')->nullable()->after('categoryId');
            }
            if (!Schema::hasColumn('subcategories', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
            if (!Schema::hasColumn('subcategories', 'status')) {
                $table->boolean('status')->default(1)->after('slug');
            }
            if (!Schema::hasColumn('subcategories', 'deleteId')) {
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
        // Schema::dropIfExists('subcategories');
    }
};
