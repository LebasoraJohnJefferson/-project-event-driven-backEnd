<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =[
        'store_id',
        'product_name',
        'product_description',
        'product_price',
        'product_quantity'
    ];
    
}
