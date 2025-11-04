<?php

namespace App\Providers;

use App\Models\Job;
use App\Policies\JobPostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Job::class => JobPostPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('is-admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('is-employer', function ($user) {
            return $user->role === 'employer';
        });

        Gate::define('is-author', function ($user) {
            return $user->role === 'author';
        });
    }
}
