<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'category_id', 'user_id' , 'click_count', 'job_name' ,'job_place', 'job_type' ,'job_status' ,'job_salary' ,'distance' ,'job_desc' ,'job_category' ,'job_level' , 'job_contact', 'phone'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
