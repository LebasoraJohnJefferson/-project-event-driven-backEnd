<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    //
    protected $fillable = [
        'store_name',
        'store_description',
        'store_image',
    ];
}
