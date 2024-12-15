<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('number_patterns', function (Blueprint $table) {
            $table->id();
            $table->string('model')->unique(); // Model name (Product, Customer, Bill)
            $table->string('template'); // Number template
            $table->integer('Nb_zeros')->default(3);
            $table->timestamps();
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_patterns');
    }
};
