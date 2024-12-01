<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'tarifs';

    // Specify the fillable attributes for mass assignment
    protected $guarded = [];

    /**
     * Get the products associated with the tarif.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_has_tarifs');
    }
}