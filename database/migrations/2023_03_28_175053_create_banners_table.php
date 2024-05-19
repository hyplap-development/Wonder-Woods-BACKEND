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
        if (!Schema::hasTable('banners')) {
            Schema::create('banners', function (Blueprint $table) {
                $table->id();
                $table->string('image')->nullable();
                $table->string('link')->nullable();
                $table->string('status')->default(1);
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('banners', function (Blueprint $table) {
            if (!Schema::hasColumn('banners', 'image')) {
                $table->string('image')->nullable()->after('id');
            }
            if (!Schema::hasColumn('banners', 'link')) {
                $table->string('link')->nullable()->after('image');
            }
            if (!Schema::hasColumn('banners', 'status')) {
                $table->string('status')->default(1)->after('link');
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
        // Schema::dropIfExists('banners');
    }
};
