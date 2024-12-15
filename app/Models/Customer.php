<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesNumbers;


class Customer extends Model
{
    

    use HasFactory,GeneratesNumbers;

    protected $table = "customers";

    protected $guarded =[];

    public static function boot()
    {
        parent::boot();

        // Automatically generate a number when creating a new product
        static::creating(function ($costumer) {
            $costumer->code = $costumer->generateNumber('Customer');
        });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'customer_has_products')
                    ->withPivot('price_sale') // Include additional fields from the pivot table
                    ->withTimestamps();
    }
}
