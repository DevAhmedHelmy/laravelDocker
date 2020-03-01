<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use App\Models\Company;
use App\Models\Category;
class Product extends Model
{

	use Translatable;
    public $translatedAttributes = ['name','description','slug'];




    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

