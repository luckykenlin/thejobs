<?php

use Illuminate\Database\Seeder;

class CompanysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Company::class, 50)->create([
            'user_id' => 4,
        ]);
    }
}
