<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'code' => 123,
            'identity_num' => 123456789,
            'name' => 'super admin',
            'slug' => 'super-admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
            'birth_date' => 123456789,
            'account_number' => 123456789,
            'birth_date' => now(),
            'hiring_date' => now(),
            'gender' => 'male',
            'basic_address' => 'Giza',
            'current_address' => 'Giza',
            'religion' => 'muslim',
            'salary' => 1000,
            'job_id' => 1,
            'department' => 1,
            'phone' => 123456
        ]);

           
        
           

        $user->attachRole('super_admin');

    }//end of run

}//end of seeder
