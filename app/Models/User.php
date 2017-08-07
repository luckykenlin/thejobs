<?php

namespace App\Models;

use App\Contracts\Constant;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sex','role_id','name', 'email', 'password', 'address', 'image', 'describe', 'birthday', 'marital', 'phone', 'nationality',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }
    /** Is User A Administrator
     * @return bool
     */
    public function isSuperAdmin()
    {
        if (Constant::ROLE_SUPER_ADMIN === DB::table('users')->whereId(Auth::user()->id)->first()->role_id)
            return true;
        else return false;
    }
}
