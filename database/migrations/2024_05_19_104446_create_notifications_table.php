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
        if (!Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->id();
                $table->integer('userId')->nullable();
                $table->string('title')->nullable();
                $table->string('message')->nullable();
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('notifications', function (Blueprint $table) {
            if (!Schema::hasColumn('notifications', 'userId')) {
                $table->integer('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('notifications', 'title')) {
                $table->string('title')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('notifications', 'message')) {
                $table->string('message')->nullable()->after('title');
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
        // Schema::dropIfExists('notifications');
    }
};
