<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesNumbers;



class Supplier extends Model
{
    use HasFactory,GeneratesNumbers;

    protected $table = "suppliers";

    protected $guarded =[];

    public static function boot()
    {
        parent::boot();

        // Automatically generate a number when creating a new product
        static::creating(function ($supplier) {
            $supplier->code = $supplier->generateNumber('Supplier');
        });
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'supplier_has_products')
                    ->withPivot('price_purchase') // Include additional fields from the pivot table
                    ->withTimestamps();
    }



}
