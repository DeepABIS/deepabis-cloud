<?php

namespace App\Policies;

use App\User;
use App\Sample;
use Illuminate\Auth\Access\HandlesAuthorization;

class SamplePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sample.
     *
     * @param  \App\User  $user
     * @param  \App\Sample  $sample
     * @return mixed
     */
    public function view(User $user, Sample $sample)
    {
        return true;
    }

    /**
     * Determine whether the user can create samples.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the sample.
     *
     * @param  \App\User  $user
     * @param  \App\Sample  $sample
     * @return mixed
     */
    public function update(User $user, Sample $sample)
    {
        return $user->isAdmin() || $sample->user->is($user);
    }

    /**
     * Determine whether the user can delete the sample.
     *
     * @param  \App\User  $user
     * @param  \App\Sample  $sample
     * @return mixed
     */
    public function delete(User $user, Sample $sample)
    {
        return $user->isAdmin() || $sample->user->is($user);
    }

    /**
     * Determine whether the user can restore the sample.
     *
     * @param  \App\User  $user
     * @param  \App\Sample  $sample
     * @return mixed
     */
    public function restore(User $user, Sample $sample)
    {
        return $user->isAdmin() || $sample->user->is($user);
    }

    /**
     * Determine whether the user can permanently delete the sample.
     *
     * @param  \App\User  $user
     * @param  \App\Sample  $sample
     * @return mixed
     */
    public function forceDelete(User $user, Sample $sample)
    {
        return $user->isAdmin() || $sample->user->is($user);
    }
}
