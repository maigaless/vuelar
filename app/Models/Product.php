<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'products';

    // Specify the fillable attributes for mass assignment
    protected $guarded = [];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tarifs associated with the product.
     */
    public function tarifs()
    {
        return $this->belongsToMany(Tarif::class, 'product_has_tarifs');
    }
}