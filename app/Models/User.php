<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        foreach($this->roles as $user_role) {
            if ($user_role->name == $role) {
                return true;
            }
        }
        return false;
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten();
    }

    public function hasPermission($permission)
    {
        foreach($this->permissions() as $user_permission) {
            if ($user_permission->name == $permission) {
                return true;
            }
        }
        return false;
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        $this->roles()->sync($role, false);
    }

    public function unsignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        $this->roles()->detach($role);
    }
}
