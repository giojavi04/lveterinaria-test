<?php

namespace LVeterinaria;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'address', 'phone', 'password', 'type'
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
     * verified is Admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->type == 'admin';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posts()
    {
        return $this->hasOne(Post::class);
    }
}
