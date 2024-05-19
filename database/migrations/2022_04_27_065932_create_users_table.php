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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('profileImage')->nullable();
                $table->string('name')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->string('password')->nullable();
                $table->string('role')->nullable();
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'profileImage')) {
                $table->string('profileImage')->nullable()->after('id');
            }
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name')->nullable()->after('profileImage');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'password')) {
                $table->string('password')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->nullable()->after('password');
            }
            if (!Schema::hasColumn('users', 'status')) {
                $table->boolean('status')->default(1)->after('role');
            }
            if (!Schema::hasColumn('users', 'deleteId')) {
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
        // Schema::dropIfExists('users');
    }
};
