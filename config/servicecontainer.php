<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/5/23
 * Time: 15:39
 */
return [
    'user' => [
        'contracts' => 'App\Contracts\User\UserRepository' ,
        'repository' => 'App\Repositories\UserRepository' ,
    ] ,

    'role' => [
        'contracts' => 'App\Contracts\Role\RoleRepository' ,
        'repository' => 'App\Repositories\RoleRepository'
    ],

    'job' => [
        'contracts' => 'App\Contracts\Job\JobRepository' ,
        'repository' => 'App\Repositories\JobRepository'
    ],

    'category' => [
        'contracts' => 'App\Contracts\Category\CategoryRepository' ,
        'repository' => 'App\Repositories\CategoryRepository'
    ],

    'company' => [
        'contracts' => 'App\Contracts\Company\CompanyRepository' ,
        'repository' => 'App\Repositories\CompanyRepository'
    ],

    'resume' => [
        'contracts' => 'App\Contracts\Resume\ResumeRepository' ,
        'repository' => 'App\Repositories\ResumeRepository'
    ],

    'message' => [
        'contracts' => 'App\Contracts\Message\MessageRepository' ,
        'repository' => 'App\Repositories\MessageRepository'
    ],

    'test' => [
        'contracts' => 'App\Contracts\Test\TestRepository' ,
        'repository' => 'App\Repositories\TestRepository'
    ],
];