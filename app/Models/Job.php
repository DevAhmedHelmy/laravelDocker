<?php

namespace App\Models;
use App\Models\User;
use Dimsav\Translatable\Translatable;

class Job extends Model
{
    use Translatable;
    public $translatedAttributes = ['name','slug'];

    // public function users()
    // {
    // 	return $this->hasMany(User::class);
    // }
}
