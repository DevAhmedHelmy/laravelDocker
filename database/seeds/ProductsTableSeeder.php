<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
     


                    \App\Models\Product::create([




                'code' => $faker->unique(true)->numberBetween(1, 50),
                'category_id' => 1,
                'company_id' => 1,
                'purchase_price' => 100,
                'sale_price' => 150,
                'ar' => ['name' => 'منتج 1', 'description' => $faker->sentence,'slug'=>str_slug('منتج 1')],
                'en' => ['name' => 'product 1', 'description' => $faker->sentence,'slug'=>str_slug('product 1')]
                ]);
         
    }
}
