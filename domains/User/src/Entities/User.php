<?php

namespace Domains\User\Entities;

use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Domains\Role\Entities\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_education_degree',
        'education_field',
        'job_title',
        'marital_status',
        'identity_number',
        'city_of_birth',
        'province_of_birth',
        'essential_mobile',
        'city_of_work',
        'province_of_work',
        'phone',
        'current_address',
        'current_city_id',
        'current_province_id',
        'mobile',
        'date_of_birth',
        'gender',
        'last_name',
        'national_code',
        'card_id',
        'home_postal_code',
        'work_postal_code',
        'education_province_id',
        'education_city_id',
        'is_active',
        'creator_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id')
            ->withPivot('status', 'created_at', 'updated_at');
    }

    /**
     * @return BelongsTo
     */
    public function currentCity()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsTo
     */
    public function currentProvince()
    {
        return $this->belongsTo(Province::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
