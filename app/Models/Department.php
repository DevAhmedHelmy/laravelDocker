<?php

namespace App\Models;
use Dimsav\Translatable\Translatable;

class Department extends Model
{
	use Translatable;
    public $translatedAttributes = ['name','slug'];
}
