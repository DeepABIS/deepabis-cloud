<?php

namespace App\Providers;

use App\Dataset;
use App\Policies\DatasetPolicy;
use App\Policies\SamplePolicy;
use App\Policies\SpeciesPolicy;
use App\Policies\UserPolicy;
use App\Sample;
use App\Species;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Dataset::class => DatasetPolicy::class,
        Sample::class => SamplePolicy::class,
        Species::class => SpeciesPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
