<?php

namespace App\Policies;

use App\Models\Color;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->checkePermission(config('common.permissons.Colors.list-colors'));

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Color  $color
     * @return mixed
     */
    public function view(User $user, Color $color)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkePermission(config('common.permissons.Colors.add-colors'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Color  $color
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkePermission(config('common.permissons.Colors.edit-colors'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Color  $color
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkePermission(config('common.permissons.Colors.delete-colors'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Color  $color
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Color  $color
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
