<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        // SuperAdmin
        $gate->define('isSuperAdmin', function($admin){
            $roles = array();
            if (count($admin->Roles) > 0){
                $roles = $admin->Roles;
            }
            $adminRoles = $roles->pluck('slug')->toArray();

            return in_array('super-admin', $adminRoles);
        });

        // Admin
        $gate->define('isAdmin', function($admin){
            $roles = array();
            if (count($admin->Roles) > 0){
                $roles = $admin->Roles;
            }
            $adminRoles = $roles->pluck('slug')->toArray();

            return (in_array('super-admin', $adminRoles) || in_array('admin', $adminRoles));
        });
    }
}
