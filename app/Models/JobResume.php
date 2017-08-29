<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/29
 * Time: 0:58
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JobResume extends Pivot
{
    protected $table = 'job_resume';

}