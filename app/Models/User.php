<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    // use HasApiTokens;
    use HasFactory;

    // use HasProfilePhoto;
    use Notifiable;

    // use TwoFactorAuthenticatable;
    protected $table = 'users';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'address',
        'image',
        'gender',
        'role',
        'status',
        'date_add',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }


    public function checkePermission($keycode)
    {

        $roles = auth()->user()->roles;
        foreach ($roles as $role) {
            $permission = $role->permissions;
           if ($permission->contains('key_code', $keycode)) {
                return true;
           }
        }
        return false;
    }
}
