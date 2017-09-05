<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'subject' , 'message' , 'email' , 'file_url' ,
    ];

    /**
     * Get the owner of this message
     */
    public function messageable()
    {
        return $this->morphTo();
    }
}
