<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/6
 * Time: 18:53
 */

namespace App\Repositories;

use App\Contracts\Resume\ResumeRepository as ResumeRepositoryImpl;
use App\Models\Resume;
use Illuminate\Support\Facades\Validator;


class ResumeRepository extends BaseRepository implements ResumeRepositoryImpl
{
    /**
     * JobRepository constructor.
     * @param Model $model
     */
    function __construct(Resume $model)
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