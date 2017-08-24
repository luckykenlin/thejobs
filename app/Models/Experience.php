<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'positon','dateScopeFrom','dateScopeEnd', 'image','desc',
    ];

    public function resumes()
    {
        return $this->belongsTo('App\Models\Resume','resume_id');
    }

}
