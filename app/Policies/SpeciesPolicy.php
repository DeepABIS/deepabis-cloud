<?php

namespace App\Policies;

use App\User;
use App\Species;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpeciesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the species.
     *
     * @param  \App\User  $user
     * @param  \App\Species  $species
     * @return mixed
     */
    public function view(User $user, Species $species)
    {
        return true;
    }

    /**
     * Determine whether the user can create species.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the species.
     *
     * @param  \App\User  $user
     * @param  \App\Species  $species
     * @return mixed
     */
    public function update(User $user, Species $species)
    {
        return $user->isAdmin() || $species->user->is($user);
    }

    /**
     * Determine whether the user can delete the species.
     *
     * @param  \App\User  $user
     * @param  \App\Species  $species
     * @return mixed
     */
    public function delete(User $user, Species $species)
    {
        return $user->isAdmin() || $species->user->is($user);
    }

    /**
     * Determine whether the user can restore the species.
     *
     * @param  \App\User  $user
     * @param  \App\Species  $species
     * @return mixed
     */
    public function restore(User $user, Species $species)
    {
        return $user->isAdmin() || $species->user->is($user);
    }

    /**
     * Determine whether the user can permanently delete the species.
     *
     * @param  \App\User  $user
     * @param  \App\Species  $species
     * @return mixed
     */
    public function forceDelete(User $user, Species $species)
    {
        return $user->isAdmin() || $species->user->is($user);
    }
}
