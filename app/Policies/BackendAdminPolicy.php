<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BackendAdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
   public function setAdminBackend(User $user){
       return $user->checkePermission(config('common.permissons.Admin.list-admin'));
   }
}
