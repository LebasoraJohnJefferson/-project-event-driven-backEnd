<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    //
    protected $fillable=[
        'order_id',
        'status',
    ];
}
