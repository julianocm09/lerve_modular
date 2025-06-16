<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
          
    ];
protected $visible = [
    'id',
    'androiid',
    'name',
    'fotoperfil',
    'email',
    'email_verified_at',
    'created_at',
    'updated_at',
    'api_key',
    'familiname',
    'Birthday',
    'Occupation',
    'Mobile',
    'Phone',
    'dicadesenha',
    'nivel',
    'biografia',
    'Country',
    'Countrycode',
    'is_blocked',
    'created_by',
    'data_vencimento',
    'is_admin', // coloque aqui explicitamente
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean', 
        
    ];
}
