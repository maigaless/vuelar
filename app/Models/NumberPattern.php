<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberPattern extends Model
{
    use HasFactory;

    protected $table = "number_patterns";

    // Specify the fillable attributes for mass assignment
    protected $guarded = [];

    
}
