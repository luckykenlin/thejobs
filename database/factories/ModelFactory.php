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
        'working_days' =>  6,
        'job_type' => \App\Contracts\Constant::FULL_TIME ,
        'job_status' => \App\Contracts\Constant::JOB_EMPTY ,
        'job_contact' => $faker->name ,
        'phone' => $faker->phoneNumber ,
        'job_salary' => 3000 ,
        'distance' => $faker->address ,
        'short_desc' => $faker->paragraph() ,
        'job_desc' => '&lt;p&gt;Google is and always will be an engineering company. We hire people with a broad set of technical skills who are ready to tackle some of technology\'s greatest challenges and make an impact on millions, if not billions, of users. At Google, engineers not only revolutionize search, they routinely work on massive scalability and storage solutions, large-scale applications and entirely new platforms for developers around the world. From AdWords to Chrome, Android to YouTube, Social to Local, Google engineers are changing the world one technological achievement after another.&lt;/p&gt;&lt;br&gt;&lt;h4 style=&quot;color: rgb(0, 0, 0);&quot;&gt;Responsibilities&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Build next-generation web applications with a focus on the client side.&lt;/li&gt;&lt;li&gt;Redesign UI\'s, implement new UI\'s, and pick up Java as necessary.&lt;/li&gt;&lt;li&gt;Explore and design dynamic and compelling consumer experiences.&lt;/li&gt;&lt;li&gt;Design and build scalable framework for web applications.&lt;/li&gt;&lt;/ul&gt;&lt;br&gt;&lt;h4 style=&quot;color: rgb(0, 0, 0);&quot;&gt;Minimum qualifications&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;BA/BS degree in a technical field or equivalent practical experience.&lt;/li&gt;&lt;li&gt;2 years of relevant work experience in software development.&lt;/li&gt;&lt;li&gt;Programming experience in C, C++ or Java.&lt;/li&gt;&lt;li&gt;Experience with AJAX, HTML and CSS.&lt;/li&gt;&lt;/ul&gt;&lt;br&gt;&lt;h4 style=&quot;color: rgb(0, 0, 0);&quot;&gt;Preferred qualifications&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;Interest in user interface design.&lt;/li&gt;&lt;li&gt;Web application development experience.&lt;/li&gt;&lt;li&gt;Experience working on cross-browser platforms.&lt;/li&gt;&lt;li&gt;Development experience designing object-oriented JavaScript.&lt;/li&gt;&lt;li&gt;Experience with user interface frameworks such as XUL, Flex and XAML.&lt;/li&gt;&lt;li&gt;Knowledge of user interface design.&lt;/li&gt;&lt;/ul&gt;',
        'job_category' => 'restaurant' ,
        'job_level' => '3-5' ,
//        'category_id' => 2 ,
//        'company_id' => 4,
    ];
    return $info;
});

$factory->define(App\Models\Company::class , function (Faker\Generator $faker) {
    $info = [
        'name' => $faker->company ,
        'location' => $faker->city ,
        'website_url' => $faker->url,
//        'social_media' => $faker->shuffleArray(),
        'email' =>  $faker->unique()->safeEmail ,
        'phone' => $faker->phoneNumber ,
        'founded_on' => $faker->time() ,
        'short_desc' => $faker->text('100') ,
        'detail' => $faker->text ,
        'employer_num' => $faker->numberBetween(5,99) ,
        'category_id' => 2 ,
        'image' => 'assets/img/job.png',
    ];
    return $info;
});
