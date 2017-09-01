<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'social_media' ,'image', 'name', 'location', 'website_url', 'phone', 'founded_on', 'email', 'short_desc', 'detail', 'employer_num', 'user_id', 'category_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User' ,'user_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    public function medias()
    {
        return $this->hasMany('App\Models\Media');
    }

    public function messages()
    {
        return $this->morphMany('App\Models\Message', 'messageable');
    }
}
