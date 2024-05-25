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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->integer('categoryId')->nullable();
                $table->integer('subcategoryId')->nullable();
                $table->integer('companyId')->nullable();
                $table->integer('sizeId')->nullable();
                $table->integer('colorId')->nullable();
                $table->integer('roomId')->nullable();
                $table->string('tag')->nullable();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->decimal('mrp')->nullable();
                $table->decimal('discountedPrice')->nullable();
                $table->integer('gst')->nullable();
                $table->integer('deliveryCharge')->default(0);
                $table->longText('description')->nullable();
                $table->string('material')->nullable();
                $table->string('finish')->nullable();
                $table->string('style')->nullable();
                $table->integer('weight')->nullable();
                $table->integer('length')->nullable();
                $table->integer('width')->nullable();
                $table->integer('height')->nullable();
                $table->integer('warranty')->nullable();
                $table->boolean('storage')->nullable();
                $table->string('image')->nullable();
                $table->boolean('status')->default(1);
                $table->boolean('deleteId')->default(0);
                $table->timestamps();
            });
        }

        // add or modify columns
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'categoryId')) {
                $table->integer('categoryId')->nullable()->after('id');
            }
            if (!Schema::hasColumn('products', 'subcategoryId')) {
                $table->integer('subcategoryId')->nullable()->after('categoryId');
            }
            if (!Schema::hasColumn('products', 'companyId')) {
                $table->integer('companyId')->nullable()->after('subcategoryId');
            }
            if (!Schema::hasColumn('products', 'sizeId')) {
                $table->integer('sizeId')->nullable()->after('companyId');
            }
            if (!Schema::hasColumn('products', 'colorId')) {
                $table->integer('colorId')->nullable()->after('sizeId');
            }
            if (!Schema::hasColumn('products', 'roomId')) {
                $table->integer('roomId')->nullable()->after('colorId');
            }
            if (!Schema::hasColumn('products', 'tag')) {
                $table->string('tag')->nullable()->after('roomId');
            }
            if (!Schema::hasColumn('products', 'name')) {
                $table->string('name')->nullable()->after('tag');
            }
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }
            if (!Schema::hasColumn('products', 'mrp')) {
                $table->decimal('mrp')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('products', 'discountedPrice')) {
                $table->decimal('discountedPrice')->nullable()->after('mrp');
            }
            if (!Schema::hasColumn('products', 'gst')) {
                $table->integer('gst')->nullable()->after('discountedPrice');
            }
            if (!Schema::hasColumn('products', 'deliveryCharge')) {
                $table->integer('deliveryCharge')->default(0)->after('gst');
            }
            if (!Schema::hasColumn('products', 'description')) {
                $table->longText('description')->nullable()->after('deliveryCharge');
            }
            if (!Schema::hasColumn('products', 'material')) {
                $table->string('material')->nullable()->after('description');
            }
            if (!Schema::hasColumn('products', 'finish')) {
                $table->string('finish')->nullable()->after('material');
            }
            if (!Schema::hasColumn('products', 'style')) {
                $table->string('style')->nullable()->after('finish');
            }
            if (!Schema::hasColumn('products', 'weight')) {
                $table->integer('weight')->nullable()->after('style');
            }
            if (!Schema::hasColumn('products', 'length')) {
                $table->integer('length')->nullable()->after('weight');
            }
            if (!Schema::hasColumn('products', 'width')) {
                $table->integer('width')->nullable()->after('length');
            }
            if (!Schema::hasColumn('products', 'height')) {
                $table->integer('height')->nullable()->after('width');
            }
            if (!Schema::hasColumn('products', 'warranty')) {
                $table->integer('warranty')->nullable()->after('height');
            }
            if (!Schema::hasColumn('products', 'storage')) {
                $table->boolean('storage')->nullable()->after('warranty');
            }
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('storage');
            }
            if (!Schema::hasColumn('products', 'status')) {
                $table->boolean('status')->default(1)->after('image');
            }
            if (!Schema::hasColumn('products', 'deleteId')) {
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
        // Schema::dropIfExists('products');
    }
};
