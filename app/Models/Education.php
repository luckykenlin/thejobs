<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'degree' , 'major' , 'school' , 'dateScopeEnd', 'dateScopeFrom' , 'image' , 'short_desc' , 'resume_id' ,
    ];

    public function resumes()
    {
        return $this->belongsTo('App\Models\Resume' , 'resume_id');
    }

}
