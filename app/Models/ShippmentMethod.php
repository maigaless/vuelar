<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippmentMethod extends Model
{
    use HasFactory;

    protected $table="shippment_methods";


    protected $fillable = [
        'name',
        'code',
        'is_active',
    ];
}
