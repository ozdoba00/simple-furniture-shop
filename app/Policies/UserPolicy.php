<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function adminResources(User $user)
    {
        return $user->role_id == Role::ADMINISTRATOR ? Response::allow() : Response::deny('No access'); // Admin
    }
}
