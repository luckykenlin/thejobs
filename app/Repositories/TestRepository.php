<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/27
 * Time: 0:46
 */

namespace App\Repositories;


class TestRepository implements \App\Contracts\Test\TestRepository
{

    public function ha()
    {
        return "dadsa";
    }

}