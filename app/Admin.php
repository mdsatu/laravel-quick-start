<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * guard
     *
     * @var string
     */
    protected $guard = 'back';

    /**
     * appends
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'title', 'email', 'mobile_number', 'address', 'bio', 'profile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'first_name', 'last_name', 'id'
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y'
    ];

    /**
     * Roles
     *
     * @return void
     */
    public function Roles(){
        return $this->belongsToMany(Role::class, 'admin_roles');
    }

    /**
     * sendPasswordResetNotification
     *
     * @param  mixed $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * getFullNameAttribute
     *
     * @return void
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * getProfileAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function getProfileAttribute($value)
    {
        if($value && file_exists(public_path('uploads/admin/' . $value))){
            return asset('uploads/admin/' . $value);
        }

        return asset('img/user-img.png');
    }
}
