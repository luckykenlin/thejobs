<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/6
 * Time: 18:53
 */

namespace App\Repositories;

use App\Contracts\Company\CompanyRepository as CompanyRepositoryImpl;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;


class CompanyRepository extends BaseRepository implements CompanyRepositoryImpl
{
    /**
     * JobRepository constructor.
     * @param Model $model
     */
    function __construct(Company $model)
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