<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'name', 'amount', 'price', 'fileName', 'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function getPriceAttribute()
    {
        $price = $this->attributes['price'];

        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $values = $formatter->formatCurrency($price, 'USD');

        return $values;
    }

    public function getCreatedAtAttribute()
    {
        $createdAt = $this->attributes['created_at'];

        return \Carbon\Carbon::parse($createdAt)->format('m/d/Y');
    }

 
}
