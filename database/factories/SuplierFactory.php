<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
    	'code' =>$faker->unique()->randomNumber,
    	'name' => $name,
    	'slug' =>  str_slug($name, '-'),
    	'email' => $faker->unique()->safeEmail,
    	'phone' =>$faker->phoneNumber,
    	'address' => $faker->address,
    	'company_id' => 1
     	 
    ];
});
 