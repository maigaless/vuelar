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
            $table->string('template'); // Number template (e.g., "{PREFIX}-{SEQUENCE}-{SUFFIX}")
            $table->string('prefix')->nullable(); // Optional prefix
            $table->string('suffix')->nullable(); // Optional suffix
            $table->timestamps();
        });


        DB::table('number_patterns')->insert([
            ['model' => 'Product', 'template' => '{PREFIX}-{SEQUENCE}', 'prefix' => 'PDT-YYMMdd', 'suffix' => null],
            ['model' => 'Customer', 'template' => '{PREFIX}-{SEQUENCE}', 'prefix' => 'CUST', 'suffix' => null],
            ['model' => 'Bill', 'template' => '{PREFIX}-{SEQUENCE}-{SUFFIX}', 'prefix' => 'YYMMdd', 'suffix' => 'BILL'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_patterns');
    }
};
