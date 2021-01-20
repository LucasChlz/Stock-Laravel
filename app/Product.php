<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'name', 'amount', 'price', 'fileName', 'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];
}
