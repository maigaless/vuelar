<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHasTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_has_tarifs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key to products
            $table->foreignId('tarif_id')->constrained('tarifs')->onDelete('cascade'); // Foreign key to tarifs
            $table->boolean('isDefault')->default(false);
            $table->decimal('sale_price', 10, 2); // Price with 2 decimal points
            $table->timestamps(); // Created at and updated at timestamps

            // Optional: Add a unique constraint to prevent duplicate entries
            $table->unique(['product_id', 'tarif_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_has_tarifs');
    }
}