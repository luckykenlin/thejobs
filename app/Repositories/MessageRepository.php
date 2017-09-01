<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/31
 * Time: 18:10
 */

namespace App\Repositories;

use App\Contracts\Message\MessageRepository as MessageRepositoryImpl;
use App\Models\Message;
use Baum\Extensions\Eloquent\Model;

class MessageRepository extends BaseRepository implements MessageRepositoryImpl
{
    /**
     * @var Message|Model
     */
    protected $model;

    /**
     * MessageRepository constructor.
     * @param Message $model
     */
    function __construct(Message $model)
    {
        parent::__construct($model);
        $this->model = $model;
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