<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')-> insert([
            'name' => 'ken',
            'email' => 'ken@example.com',
            'sex' => \App\Contracts\Constant::MALE,
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'address' => $faker->address,
            'image' => 'storage/images/default/male.jpg',
            'describe' => $faker->jobTitle,
            'birthday' => $faker->date(),
            'role_id' => \App\Contracts\Constant::ROLE_SUPER_ADMIN,
            'phone' => $faker->phoneNumber,
            'marital' => $faker->boolean,
            "created_at" => new Carbon(),
            "updated_at" => new Carbon(),
            'nationality' => 'CN',
        ]);
        DB::table('users')-> insert([
            'name' => 'ken',
            'email' => 'lkk@example.com',
            'sex' => \App\Contracts\Constant::MALE,
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'address' => $faker->address,
            'image' => 'storage/images/default/male.jpg',
            'describe' => $faker->jobTitle,
            'birthday' => $faker->date(),
            'role_id' => \App\Contracts\Constant::ROLE_COMMON,
            'phone' => $faker->phoneNumber,
            'marital' => $faker->boolean,
            'nationality' => 'CN',
            "created_at" => new Carbon(),
            "updated_at" => new Carbon(),
        ]);
    }
}
