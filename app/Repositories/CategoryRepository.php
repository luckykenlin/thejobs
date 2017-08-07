<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/6
 * Time: 18:54
 */

namespace App\Repositories;

use \App\Contracts\Category\CategoryRepository as CategoryRepositoryImpl;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class CategoryRepository extends BaseRepository implements CategoryRepositoryImpl
{
    /**
     * JobRepository constructor.
     * @param Model $model
     */
    function __construct(Category $model)
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