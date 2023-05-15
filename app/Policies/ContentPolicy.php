<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the content can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the content can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Content  $model
     * @return mixed
     */
    public function view(User $user, Content $model)
    {
        return true;
    }

    /**
     * Determine whether the content can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the content can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Content  $model
     * @return mixed
     */
    public function update(User $user, Content $model)
    {
        return true;
    }

    /**
     * Determine whether the content can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Content  $model
     * @return mixed
     */
    public function delete(User $user, Content $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Content  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the content can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Content  $model
     * @return mixed
     */
    public function restore(User $user, Content $model)
    {
        return false;
    }

    /**
     * Determine whether the content can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Content  $model
     * @return mixed
     */
    public function forceDelete(User $user, Content $model)
    {
        return false;
    }
}
