<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'job_title','short_desc','image', 'location', 'website_url' ,'hourly_rate', 'age' ,'phone' ,'email' ,'cv_url' ,'user_id' ,
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\Education');
    }


    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }


    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\Tag');
    }

    public function medias()
    {
        return $this->hasMany('App\Models\Media');
    }

}
