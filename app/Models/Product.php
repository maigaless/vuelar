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


public function depots()
{
    return $this->belongsToMany(DepotStock::class, 'depot_has_products')
                ->withPivot('quantity') // Add additional columns from the pivot table
                ->withTimestamps(); // If you want to keep track of when the relation was created/updated
}


public function tarifs()
{
    return $this->belongsToMany(Tarif::class, 'product_has_tarifs')
                ->withPivot('tarif') // Tarif price of the product at the depot
                ->withTimestamps();
}

  // Define the relationship with the Supplier model through the depot_has_suppliers pivot table
  public function suppliers()
  {
      return $this->belongsToMany(Supplier::class, 'supplier_has_products')
                  ->withTimestamps(); // Track when the relation was updated
  }

  // Define the relationship with the Customer model through the customers_has_products pivot table
  public function customers()
  {
      return $this->belongsToMany(Customer::class, 'customers_has_products')
                  ->withTimestamps();
  }
  
}