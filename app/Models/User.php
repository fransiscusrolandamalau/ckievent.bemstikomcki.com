<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function gravatar()
    {
        return 'https://secure.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?&s=150';
    }
}
