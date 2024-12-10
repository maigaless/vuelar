<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Product name
            $table->string('barcode', 13)->nullable(); // Product name
            $table->string('sku')->nullable(); // Product name
            $table->text('description')->nullable(); // Optional description
            $table->decimal('cost', 10, 2); // Price with 2 decimal points
            $table->boolean('tracking_stock')->default(true);
            $table->unsignedInteger('stock')->default(0); // Stock quantity
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}