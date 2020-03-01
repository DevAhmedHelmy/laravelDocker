<?php

namespace App\Models;


use App\Model\Cient;
use App\Model\Product;
class Order extends Model
{
    public function client ()
    {
        return $this->belongsTo(Client::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_order')->withPivot('quantity');
    }
}
