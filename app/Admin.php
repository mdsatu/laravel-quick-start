<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'mobile_number', 'address', 'bio', 'image', 'password',
    ];

    // Role
    public function Role(){
        return $this->belongsToMany(Role::class, 'admin_roles');
    }
}
