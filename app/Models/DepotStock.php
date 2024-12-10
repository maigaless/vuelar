<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepotStock extends Model
{
    use HasFactory;
    protected $table="depotstocks";
    protected $fillable = ['ds_name', 'ds_code', 'ds_isDefault', 'ds_parent_id', 'ds_type'];

    
}
