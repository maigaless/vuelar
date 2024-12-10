<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depotstocks', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('ds_name'); // Depot stock name
            $table->string('ds_code')->unique(); // Depot stock code (unique)
            $table->boolean('ds_isDefault')->default(false); // Indicates if it's the default stock
            $table->unsignedBigInteger('ds_parent_id')->nullable(); // Parent depot stock ID
            $table->integer('ds_type')->default(0); // Depot stock type
            $table->timestamps(); // Created at and updated at timestamps

            // Add a foreign key constraint for `ds_parent_id`
            $table->foreign('ds_parent_id')->references('id')->on('depotstocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depotstocks');
    }
}
