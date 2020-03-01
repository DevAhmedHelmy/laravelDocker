<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use App\Models\Product;


class Company extends Model
{

    use Translatable;
    public $translatedAttributes = ['name','slug'];


	
	

    



    public function products()
    {
    	return $this->hasMany(Product::Class);
    }
}
