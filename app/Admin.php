<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $guard = 'back';

    protected $fillable = [
        'first_name', 'last_name', 'title', 'email', 'mobile_number', 'address', 'bio', 'image', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Generate Name
    public function Name(){
        return ($this->first_name ? ($this->first_name . ' ' . $this->last_name) : $this->last_name);
    }

    // Role
    public function Roles(){
        return $this->belongsToMany(Role::class, 'admin_roles');
    }

    // AdminResetPasswordNotification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
