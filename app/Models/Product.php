<?php

namespace App\Models;

use App\Traits\GeneratesNumbers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory,GeneratesNumbers;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'products';

    protected $guarded="";

    public static function boot()
    {
        parent::boot();

        // Automatically generate a number when creating a new product
        static::creating(function ($product) {
            $product->sku = $product->generateNumber('Product');
        });
    }


    public function rollbackSequence($model)
{
    $sequence = DB::table('number_sequences')->where('model', $model)->first();

    if ($sequence && $sequence->sequence > 0) {
        DB::table('number_sequences')->where('model', $model)->decrement('sequence');
    }
}
  
}