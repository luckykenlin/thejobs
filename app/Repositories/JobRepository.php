<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/7/3
 * Time: 9:51
 */

namespace App\Repositories;
use \App\Contracts\Job\JobRepository as JobRepositoryImpl;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;

class JobRepository extends BaseRepository implements JobRepositoryImpl
{
    /**
     * JobRepository constructor.
     * @param Model $model
     */
    function __construct(Job $model)
    {
        parent::__construct($model);
    }

    /**
     * Validate
     * @param array $data
     * @return void
     */
    public function validator(array $data)
    {
        return Validator::make($data , [

        ]);
    }
}