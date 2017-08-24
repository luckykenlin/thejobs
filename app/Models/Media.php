<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $table = 'medias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'company_id', 'resume_id',
    ];

    public function resumes()
    {
        return $this->belongsTo('App\Models\Resume','resume_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id');
    }
}
