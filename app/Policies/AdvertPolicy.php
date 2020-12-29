<?php

namespace App\Policies;

use App\Models\Advert;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function view(User $user, Advert $advert)
    {
        $role=(new UserService())->getRole($user);

        return (auth()->user()->id === $advert->user->id) || ($role->title == 'admin' || $role->title == 'manager');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function update(User $user, Advert $advert)
    {
        $role=(new UserService())->getRole($user);

        return (auth()->user()->id === $advert->user->id) || ($role->title == 'admin' || $role->title == 'manager');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function delete(User $user, Advert $advert)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function restore(User $user, Advert $advert)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Advert  $advert
     * @return mixed
     */
    public function forceDelete(User $user, Advert $advert)
    {
        //
    }
}
