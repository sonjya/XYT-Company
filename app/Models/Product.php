<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_name',
        'supplier_name',
        'price',
        'stocks',
        'addedby',
        'updatedby',
        'active',
    ];

}
