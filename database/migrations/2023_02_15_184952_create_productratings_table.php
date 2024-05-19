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
        if (!Schema::hasTable('productratings')) {
            Schema::create('productratings', function (Blueprint $table) {
                $table->id();
                $table->integer('productId')->nullable();
                $table->integer('userId')->nullable();
                $table->integer('rating')->nullable();
                $table->text('comment')->nullable();
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('productratings', function (Blueprint $table) {
            if (!Schema::hasColumn('productratings', 'productId')) {
                $table->integer('productId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('productratings', 'userId')) {
                $table->integer('userId')->nullable()->after('productId');
            }
            if (!Schema::hasColumn('productratings', 'rating')) {
                $table->integer('rating')->nullable()->after('userId');
            }
            if (!Schema::hasColumn('productratings', 'comment')) {
                $table->text('comment')->nullable()->after('rating');
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
        // Schema::dropIfExists('productratings');
    }
};
