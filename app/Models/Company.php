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
        'name', 'location', 'website_url', 'phone', 'founded_on', 'email', 'short_desc', 'detail', 'employer_num', 'user_id', 'category_id'
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
