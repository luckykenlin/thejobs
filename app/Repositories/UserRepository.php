<?php
/**
 * Created by PhpStorm.
 * User:  Ken Lin
 * Date: 2017/5/19
 * Time: 5:02
 */

namespace App\Repositories;

use App\Contracts\Constant;
use \App\Contracts\User\UserRepository as UserRepositoryImpl;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserRepository extends BaseRepository implements UserRepositoryImpl
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    function __construct(User $model)
    {
        parent::__construct($model);
    }

    /** Save User Info
     * @param $data
     * @return mixed
     * @internal param $id
     */
    public function save($data)
    {
        return  $this->model->create([
            'role_id' => $data['role_id'] ,
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            'password' => bcrypt($data['password']) ,
        ]);
    }
    /**
     * Validate User create .
     * @param array $data
     * @return void
     */
    public function validator(array $data)
    {
        return Validator::make($data , [
            'name' => 'required|string|max:50' ,
            'email' => 'sometimes|required|string|email|max:255|unique:users' ,
            'password' => 'sometimes|required|string|min:6|confirmed' ,
            "image" => [
                'required' , 'sometimes' ,
                Rule::dimensions()->maxWidth(1000)->maxHeight(1000)->minWidth(100)->minHeight(100) ,
            ] ,
            "birthday" => 'sometimes|required|date' ,
            "marital" => 'sometimes|required|boolean' ,
            "previous" => 'sometimes|required' ,
            "phone" => 'sometimes|required' ,
            "nationality" => 'sometimes|required' ,
            "address" => 'sometimes|required' ,
            "education" => 'sometimes|required' ,
            "skype" => 'sometimes|required' ,
            "describe" => 'sometimes|required' ,
        ]);
    }
}