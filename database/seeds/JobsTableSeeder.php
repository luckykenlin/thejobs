<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create()->each(function ($u) {
            $u->jobs()->save(factory(App\Models\Job::class)->make());
        });
        factory(App\Models\Job::class, 50)->create([
            'user_id' => 4,
            'company_id' => 1,
        ]);
    }
}
