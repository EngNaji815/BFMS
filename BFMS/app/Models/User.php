<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['email', 'password', 'role', 'is_active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function worker(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function admin(): HasOne
{
    return $this->hasOne(Admin::class);
}

public function manager(): HasOne
{
    return $this->hasOne(Manager::class);
}

public function employee(): HasOne
{
    return $this->hasOne(employee::class);
}

public function customer(): HasOne
{
    return $this->hasOne(Customer::class);
}
}