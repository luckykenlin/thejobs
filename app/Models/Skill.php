<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'rate','resume_id',
    ];

    public function resumes()
    {
        return $this->belongsTo('App\Models\Resume','resume_id');
    }

}
