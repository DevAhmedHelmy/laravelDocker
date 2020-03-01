<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         

         
            \App\Models\Department::create([
                'ar' => ['name' => 'ادارة تقنية المعلومات','slug'=>str_slug('ادارة تقنية المعلومات')], 
                'en' => ['name' => 'IT Management','slug'=>str_slug('IT Management')]
            ]);
            # code...
         
    }
}
