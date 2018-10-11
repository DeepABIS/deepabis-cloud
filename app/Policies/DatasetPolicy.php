<?php

namespace App\Policies;

use App\User;
use App\Dataset;
use Illuminate\Auth\Access\HandlesAuthorization;

class DatasetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the dataset.
     *
     * @param  \App\User  $user
     * @param  \App\Dataset  $dataset
     * @return mixed
     */
    public function view(User $user, Dataset $dataset)
    {
        return true;
    }

    /**
     * Determine whether the user can create datasets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the dataset.
     *
     * @param  \App\User  $user
     * @param  \App\Dataset  $dataset
     * @return mixed
     */
    public function update(User $user, Dataset $dataset)
    {
        return $user->isAdmin() || $dataset->user->is($user);
    }

    /**
     * Determine whether the user can delete the dataset.
     *
     * @param  \App\User  $user
     * @param  \App\Dataset  $dataset
     * @return mixed
     */
    public function delete(User $user, Dataset $dataset)
    {
        return $user->isAdmin() || $dataset->user->is($user);
    }

    /**
     * Determine whether the user can restore the dataset.
     *
     * @param  \App\User  $user
     * @param  \App\Dataset  $dataset
     * @return mixed
     */
    public function restore(User $user, Dataset $dataset)
    {
        return $user->isAdmin() || $dataset->user->is($user);
    }

    /**
     * Determine whether the user can permanently delete the dataset.
     *
     * @param  \App\User  $user
     * @param  \App\Dataset  $dataset
     * @return mixed
     */
    public function forceDelete(User $user, Dataset $dataset)
    {
        return $user->isAdmin() || $dataset->user->is($user);
    }
}
