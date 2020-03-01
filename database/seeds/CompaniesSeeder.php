<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            
         
            \App\Models\Company::create([
                'ar' => ['name' => 'الشركة الاولى','slug'=>str_slug('الشركة الاولى')],
                'en' => ['name' => 'company one','slug'=>str_slug('company one')],

                'code' => $faker->unique(true)->numberBetween(1, 50),

                ]);
         
    }
}
