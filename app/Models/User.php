<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function isBeheerder(): bool
    {
        return $this->role === 'Beheerder';
    }

    public function isAanbieder(): bool
    {
        return $this->role === 'Aanbieder';
    }
}
