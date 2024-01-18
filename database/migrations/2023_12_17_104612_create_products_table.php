<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
          //  $table->freignId('products_id');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('vendor_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_slug')->nullable();
            $table->integer('product_code');
            $table->integer('product_qty');
            $table->integer('selling_price');
            $table->integer('discount_price')->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_tag')->nullable();
            $table->string('product_thumbnail');
            $table->integer('special_offer')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('hot_deal')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('status')->default(1);
           // $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
