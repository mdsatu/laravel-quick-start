<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // SuperAdmin
        $gate->define('isSuperAdmin', function($admin){
            $roles = array();
            if (count($admin->Roles) > 0){
                $roles = $admin->Roles;
            }
            $adminRoles = $roles->pluck('slug')->toArray();

            return in_array('super-admin', $adminRoles);
        });

        // SuperAdmin
        $gate->define('isAdmin', function($admin){
            $roles = array();
            if (count($admin->Roles) > 0){
                $roles = $admin->Roles;
            }
            $adminRoles = $roles->pluck('slug')->toArray();

            return (in_array('super-admin', $adminRoles) || in_array('admin', $adminRoles));
        });

        Passport::routes();
    }
}
