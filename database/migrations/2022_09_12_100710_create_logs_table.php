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
        if (!Schema::hasTable('logs')) {
            Schema::create('logs', function (Blueprint $table) {
                $table->id();
                $table->integer('userId')->nullable();
                $table->string('action')->nullable();
                $table->string('function')->nullable();
                $table->text('data')->nullable();
                $table->string('ip')->nullable();
                $table->timestamps();
            });
        }
        
        // add or modify columns
        Schema::table('logs', function (Blueprint $table) {
            if (!Schema::hasColumn('logs', 'userId')) {
                $table->integer('userId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('logs', 'action')) {
                $table->string('action')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('logs', 'function')) {
                $table->string('function')->nullable()->after('action');
            }
            if (!Schema::hasColumn('logs', 'data')) {
                $table->text('data')->nullable()->after('function');
            }
            if (!Schema::hasColumn('logs', 'ip')) {
                $table->string('ip')->nullable()->after('data');
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
        // Schema::dropIfExists('logs');
    }
};
