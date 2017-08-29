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
        factory(App\Models\Company::class , 10)->create([
            'user_id' => 4 ,
        ])->each(function ($u) {
            for ($i = 0; $i < 8; $i++) {
                $j = $u->jobs()->save(factory(App\Models\Job::class)->make());
                for ($y = 0; $y < 5; $y++) {
                    $r = $j->resumes()->save(factory(App\Models\Resume::class)->make([
                        'user_id' => 4 ,
                    ]));
                    $r->tags()->save(factory(App\Models\Tag::class)->make());
                    $r->tags()->save(factory(App\Models\Tag::class)->make());
                    $r->tags()->save(factory(App\Models\Tag::class)->make());
                    $r->educations()->save(factory(App\Models\Education::class)->make());
                    $r->educations()->save(factory(App\Models\Education::class)->make());
                    $r->experiences()->save(factory(App\Models\Experience::class)->make());
                    $r->experiences()->save(factory(App\Models\Experience::class)->make());
                    $r->experiences()->save(factory(App\Models\Experience::class)->make());
                    $r->skills()->save(factory(App\Models\Skill::class)->make());
                    $r->skills()->save(factory(App\Models\Skill::class)->make());
                    $r->skills()->save(factory(App\Models\Skill::class)->make());
                    $r->skills()->save(factory(App\Models\Skill::class)->make());
                    $r->skills()->save(factory(App\Models\Skill::class)->make());
                    $r->skills()->save(factory(App\Models\Skill::class)->make());
                    $r->medias()->save(factory(App\Models\Media::class)->make());
                    $r->medias()->save(factory(App\Models\Media::class)->make());
                    $r->medias()->save(factory(App\Models\Media::class)->make());
                    $r->medias()->save(factory(App\Models\Media::class)->make());
                    $r->medias()->save(factory(App\Models\Media::class)->make());
                    $r->medias()->save(factory(App\Models\Media::class)->make());
                }
            }
            for ($h = 0; $h < 4; $h++) {
                $u->medias()->save(factory(App\Models\Media::class)->make());
            }
        });
    }
}
