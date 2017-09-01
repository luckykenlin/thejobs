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
        'resume_id' , 'short_desc' , 'company_id' , 'category_id' , 'click_count' , 'job_name' , 'job_place' , 'job_type' , 'job_status' , 'job_salary' , 'distance' , 'job_desc' , 'job_category' , 'job_level' , 'job_contact' , 'phone' , 'working_days'
    ];

//    public function users()
//    {
//        return $this->belongsTo('App\Models\User','user_id');
//    }

//    public function categories()
//    {
//        return $this->belongsTo('App\Models\Category','category_id');
//    }
    public function companies()
    {
        return $this->belongsTo('App\Models\Company' , 'company_id');
    }

    public function resumes()
    {
        return $this->belongsToMany('App\Models\Resume' , 'job_resume')
                                    ->withTimestamps()
                                    ->using('App\Models\JobResume')
                                    ->withPivot('id','status');
    }

    public function messages()
    {
        return $this->morphMany('App\Models\Message', 'messageable');
    }

}
