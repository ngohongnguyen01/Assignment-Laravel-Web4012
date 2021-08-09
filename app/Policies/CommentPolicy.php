<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function listComment(User $user)
    {
        return $user->checkePermission(config('common.permissons.Comments.list-comments'));
    }

    public function deleteComment(User $user)
    {
        return $user->checkePermission(config('common.permissons.Comments.delete-comments'));
    }

    public function updateComment(User $user)
    {
        return $user->checkePermission(config('common.permissons.Comments.edit-comments'));
    }

    public function showComment(User $user)
    {
        return $user->checkePermission(config('common.permissons.Comments.show-comments'));
    }


}
