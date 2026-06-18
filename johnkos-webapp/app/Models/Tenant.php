<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tenant extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\TenantFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone',
        'password',
    ];

    public function casts(): array{
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }

    public function occupancy(){
        return $this->hasOne(Occupancy::class);
    }
}
