<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
	$faker->addProvider(new \Faker\Provider\en_US\Person($faker));
     
    $name = $faker->unique()->name;
    return [
    	'code' =>$faker->unique()->randomNumber,
    	'name' => $name, 
    	'slug' =>  str_slug($name, '-'),
        
         
    ];
});
