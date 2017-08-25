<?php

use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
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
            $u->tags()->save(factory(App\Models\Tag::class)->make());
            $u->tags()->save(factory(App\Models\Tag::class)->make());
            $u->educations()->save(factory(App\Models\Education::class)->make());
            $u->educations()->save(factory(App\Models\Education::class)->make());
            $u->experiences()->save(factory(App\Models\Experience::class)->make());
            $u->experiences()->save(factory(App\Models\Experience::class)->make());
            $u->experiences()->save(factory(App\Models\Experience::class)->make());
            $u->skills()->save(factory(App\Models\Skill::class)->make());
            $u->skills()->save(factory(App\Models\Skill::class)->make());
            $u->skills()->save(factory(App\Models\Skill::class)->make());
            $u->skills()->save(factory(App\Models\Skill::class)->make());
            $u->skills()->save(factory(App\Models\Skill::class)->make());
        });
    }
}
