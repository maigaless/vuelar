<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'categories';

    // Specify the fillable attributes for mass assignment
    protected $guarded = [];

    /**
     * Get the products associated with the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the tarifs associated with the category through products.
     */
    public function tarifs()
    {
        return $this->hasManyThrough(Tarif::class, Product::class);
    }
}