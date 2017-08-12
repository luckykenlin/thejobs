<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
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
        ])->each(function ($u) {
            $u->jobs()->save(factory(App\Models\Job::class)->make());
        });
    }
}
