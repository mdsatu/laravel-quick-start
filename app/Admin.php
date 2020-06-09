<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $fillable = [
        'name', 'title', 'email', 'mobile_number', 'address', 'bio', 'image', 'password',
    ];

    // Role
    public function Roles(){
        return $this->belongsToMany(Role::class, 'admin_roles');
    }
}
