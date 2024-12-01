<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasTarif extends Model
{
    use HasFactory;

    // If you have additional fields in the pivot table, specify them here
    protected $guarded = [];

    /**
     * Get the product associated with the tarif.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the tarif associated with the product.
     */
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
}