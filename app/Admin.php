<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'first_name', 'last_name', 'title', 'email', 'mobile_number', 'address', 'bio', 'image', 'password',
    ];

    // Generate Name
    public function Name(){
        return ($this->first_name ? ($this->first_name . ' ' . $this->last_name) : $this->last_name);
    }

    // Role
    public function Roles(){
        return $this->belongsToMany(Role::class, 'admin_roles');
    }
}
