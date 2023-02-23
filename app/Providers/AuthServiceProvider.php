<?php

namespace App\Providers;

use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //システム管理者
        Gate::define('superAdmin',function(User $user){
            return($user->role >=2 );
        });

        //管理ユーザー承認
        Gate::define('admin',function(User $user){
            return($user->role >= 1);
        });
    }
}
