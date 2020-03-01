<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         

         
            \App\Models\Category::create([
                'ar' => ['name' => 'الصنف الاول','slug'=>str_slug('الصنف الاول')],
                'en' => ['name' => 'category one','slug'=>str_slug('category one')],

                'code' => $faker->unique(true)->numberBetween(1, 50),
            ]);
            # code...
         
    }
}
