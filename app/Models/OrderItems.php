<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    //
    protected $fillable=[
        'product_id',
        'order_quantity',
        'order_status',
    ];
}
