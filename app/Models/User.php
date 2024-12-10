<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_ENTRY =  'Entry';
    const ROLE_USER = 'User';

    const ROLE_DEFAULT = self::ROLE_USER;



    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_ENTRY => 'Entry',
        self::ROLE_USER => 'User',

    ];


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isEntry() || $this->isUser();
    }


    public function isAdmin() {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isEntry() {
        return $this->role == self::ROLE_ENTRY;
    }


    public function isUser() {
        return $this->role == self::ROLE_USER;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
