<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class , function (Faker\Generator $faker) {
    static $password;


    $info = [
        'name' => $faker->name ,
        'sex' => $faker->boolean ,
        'email' => $faker->unique()->safeEmail ,
        'password' => bcrypt('secret') ,
        'remember_token' => str_random(10) ,
        'address' => $faker->address ,
        'describe' => $faker->jobTitle ,
        'birthday' => $faker->date() ,
        'role_id' => \App\Contracts\Constant::ROLE_COMMON ,
        'phone' => $faker->phoneNumber ,
        'marital' => $faker->boolean ,
        'nationality' => array_rand(config('countries') , 1) ,
    ];
    if ($info['sex'] == \App\Contracts\Constant::MALE) $info['image'] = 'storage/images/default/male.jpg';
    else $info['image'] = 'storage/images/default/female.jpg';
    return $info;
});

$factory->define(App\Models\Job::class , function (Faker\Generator $faker) {
    $info = [
        'job_name' => $faker->jobTitle ,
        'job_place' => $faker->city ,
        'job_type' => \App\Contracts\Constant::FULL_TIME ,
        'job_status' => \App\Contracts\Constant::JOB_PENDED_SUCCESSFUL ,
        'job_contact' => $faker->name ,
        'phone' => $faker->phoneNumber ,
        'job_salary' => '3000' ,
        'distance' => $faker->address ,
        'job_desc' => $faker->paragraph() ,
        'job_category' => 'restaurant' ,
        'job_level' => '3-5 years' ,
        'model_id' => 2 ,
    ];
    return $info;
});
