<?php

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Supplier;
use App\Models\Company;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(LaratrustSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(CompaniesSeeder::class);
        factory(Company::class, 1000)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        factory(Client::class, 1000)->create();
        factory(Supplier::class, 1000)->create();

    }
}
