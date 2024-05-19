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
        if (!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('logo')->nullable();
                $table->string('name')->nullable();
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('companies', function (Blueprint $table) {
            if (!Schema::hasColumn('companies', 'logo')) {
                $table->string('logo')->nullable()->after('id');
            }
            if (!Schema::hasColumn('companies', 'name')) {
                $table->string('name')->nullable()->after('logo');
            }
            if (!Schema::hasColumn('companies', 'status')) {
                $table->boolean('status')->default(1)->after('name');
            }
            if (!Schema::hasColumn('companies', 'deleteId')) {
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
        // Schema::dropIfExists('companies');
    }
};
