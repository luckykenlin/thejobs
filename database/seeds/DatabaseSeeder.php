<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         Category::create(['name' => 'Root category'])->children()->create(['name' => 'restaurant']);
         $this->call(CompaniesTableSeeder::class);
         $this->call(JobsTableSeeder::class);
    }
}
