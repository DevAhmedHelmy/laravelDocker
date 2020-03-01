<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

	$name = $faker->unique()->name;
    return [
    	'code' =>$faker->unique()->randomNumber,
    	'name' => $name,
    	'slug' =>  str_slug($name, '-'),
    	'email' => $faker->unique()->safeEmail,
    	'phone' =>$faker->phoneNumber,
    	'address' => $faker->address,
    	'type' => $faker->numberBetween(1,10)
     	 
    ];
});
