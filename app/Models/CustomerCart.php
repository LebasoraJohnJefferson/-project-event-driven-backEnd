<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCart extends Model
{
    //
    protected $fillable=[
        'customer_id',
        'product_id',
        'quantity',
    ];
}
