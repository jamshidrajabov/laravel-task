<?php

namespace App\Providers;
use App\Models\Answer;
use App\Models\User;
use App\Policies\AnswerPolicy;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Answer::class => AnswerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('answer.create', function (User $user) {
        //     return $user->role->name === 'manager';
        // });
        // Gate::define('answer.store', function (User $user) {
        //     return $user->role->name === 'manager';
        // });
    }
}
