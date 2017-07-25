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
];