<?php

namespace App;

use App\Domains\Roles\Entities\Roles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return auth()->user()->role_id == config('roles.super_admin.id') ? true : false;
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->role->contains('name' , $role);
        }

        return !! $role->intersect($this->roles)->count();
    }


    /**
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
