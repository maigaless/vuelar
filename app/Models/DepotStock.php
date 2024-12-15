<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepotStock extends Model
{
    use HasFactory;
    
    protected $table="depotstocks";

    protected $guarded = [];

     // Define the relationship with the Product model through the depot_has_products pivot table
     public function products()
     {
         return $this->belongsToMany(Product::class, 'depot_has_products')
                     ->withPivot('quantity') // Include additional fields from the pivot table
                     ->withTimestamps();
     }
    
}
