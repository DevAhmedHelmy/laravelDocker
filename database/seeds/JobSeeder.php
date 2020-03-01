<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
          

            \App\Models\Job::create([
            	'code' => $faker->randomDigit,
                'en' => ['name' => 'manager','slug'=>str_slug('manager')], 
                'ar' => ['name' => 'مدير','slug'=>str_slug('مدير')]
            ]);
            # code...
        

    }
}
