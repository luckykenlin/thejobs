<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Resume::class, 50)->create([
            'user_id' => 4,
        ])->each(function ($u) {
            $u->tags()->save(factory(App\Models\Tag::class)->make());
        });
    }
}
