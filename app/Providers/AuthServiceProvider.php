<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-post', function (User $user, Post $post) {
            // dd(['user_id User model'=>$user->id, 'user_id Post model'=>$post->user_id]);
            return $user->id === $post->user_id;
        });
        // if the user is a guest and want to see other authenticated users posts use 'alpha-post'}
        Gate::define('user-check-alpha', function (User $user, $userId) {
            // dd(['User Model: '=>$user->id,'$userId GET'=>$userId]);
            return $user->id === $userId;
        });
    }
}
