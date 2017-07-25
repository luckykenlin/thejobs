<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */

    public function before(User $user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function update(User $user, $id)
    {
        if (Auth::user()->id == $id) {
            return true;
        }
        else return false;
    }

    public function admin(User $user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
        else return false;
    }


}
