<?php

namespace App\Models;
 
class SaleRepresentative extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name','description'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = ($profit / $this->purchase_price) * 100;
        return number_format($profit_percent, 2);

    }//end of get profit attribute

    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_order');
    }
}
