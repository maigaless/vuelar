<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('code',13)->unique(); // Name of the tax
            $table->string('name'); // Tax name, e.g., "VAT"
            $table->decimal('rate', 8, 2); // Tax rate, e.g., 20.00 for 20%
            $table->boolean('percentage')->default(true); // "percentage" or "fixed"
            $table->boolean('is_active')->default(true); // Whether the tax is active
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
        Schema::dropIfExists('taxes');
    }
}
