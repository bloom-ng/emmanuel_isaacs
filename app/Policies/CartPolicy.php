<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cart can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the cart can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cart  $model
     * @return mixed
     */
    public function view(User $user, Cart $model)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the cart can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the cart can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cart  $model
     * @return mixed
     */
    public function update(User $user, Cart $model)
    {
        return false;
    }

    /**
     * Determine whether the cart can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cart  $model
     * @return mixed
     */
    public function delete(User $user, Cart $model)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cart  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the cart can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cart  $model
     * @return mixed
     */
    public function restore(User $user, Cart $model)
    {
        return false;
    }

    /**
     * Determine whether the cart can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cart  $model
     * @return mixed
     */
    public function forceDelete(User $user, Cart $model)
    {
        return false;
    }
}
