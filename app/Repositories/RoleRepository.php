<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/5/25
 * Time: 6:55
 */

namespace App\Repositories;
use \App\Contracts\Role\RoleRepository as RoleRepositoryImpl;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;


class RoleRepository extends BaseRepository implements RoleRepositoryImpl
{
    /**
     * RoleRepository constructor.
     * @param Model $model
     */
    function __construct(Role $model)
    {
        parent::__construct($model);
    }

    /** Save Info
     * @param $data
     * @return mixed
     * @internal param $id
     */
    public function save($data)
    {
        return  $this->model->create([
            'role' => $data['role'] ,
            'permission' => $data['permission'] ,
        ]);
    }

    /**
     * Validate
     * @param array $data
     * @return void
     */
    public function validator(array $data)
    {
        return Validator::make($data , [
            'permission' => 'required|string' ,
            "role" => 'required|string' ,
        ]);
    }
}