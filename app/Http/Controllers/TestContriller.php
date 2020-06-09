<?php

namespace App\Http\Controllers;

use App\Role;
use App\Admin;
use App\Setting;
use App\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    // Test Route
    public function index(){
        dd(123);
    }

    // Import some demo data
    public function defaultConfig(){
        // Generate Roles
        $str = 'Super Admin';
        $roles['title'] = $str;
        $roles['slug'] = Str::of($str)->kebab();
        Role::updateOrInsert($roles);

        $str = 'Admin';
        $roles['title'] = $str;
        $roles['slug'] = Str::of($str)->kebab();
        Role::updateOrInsert($roles);

        // $str = 'Order Employee';
        // $roles['title'] = $str;
        // $roles['slug'] = Str::of($str)->kebab();
        // Role::updateOrInsert($roles);

        // $str = 'Product Employee';
        // $roles['title'] = $str;
        // $roles['slug'] = Str::of($str)->kebab();
        // Role::updateOrInsert($roles);


        // Create Admin
        $checkAdmin = Admin::where('email', 'admin@me.com')->first();
        if(!$checkAdmin){
            $admin = new Admin();    
            $admin->name = 'Demo Admin';
            $admin->email = 'admin@me.com';
            $admin->mobile_number = '+8801747323285';
            $admin->password = Hash::make('123456789');
            $admin->save();

            // Get admin role
            $role = Role::where('slug','super-admin')->first();
            if (isset($role)){
                // Assign admin's role
                $userRole = new AdminRole();
                $userRole->admin_id = $admin->id;
                $userRole->role_id = $role->id;
                $userRole->save();
            }
        }

        // Create Settings
        $setting['group'] = 'general';
        $setting['name'] = 'title';
        $setting['value'] = env("PROJECT_NAME", "Name");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'short_title';
        $setting['value'] =  env("PROJECT_SHORT_NAME", "Name");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'slogan';
        $setting['value'] =  env("PROJECT_SLOGAN", "Laravel Quick Start");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'web_url';
        $setting['value'] =  env("PROJECT_DOMAIN", "me.com");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'email';
        $setting['value'] =  env("PROJECT_EMAIL", "admin@me.com");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'mobile';
        $setting['value'] =  env("PROJECT_MOBILE", "000000000");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'address';
        $setting['value'] =  env("PROJECT_ADDRESS", "Address");
        Setting::updateOrInsert($setting);

        $setting['group'] = 'general';
        $setting['name'] = 'copyright';
        $setting['value'] =  env("PROJECT_COPYRIGHT", "LaravelQS @ 2020");
        Setting::updateOrInsert($setting);

        dd('Success');
    }
}
