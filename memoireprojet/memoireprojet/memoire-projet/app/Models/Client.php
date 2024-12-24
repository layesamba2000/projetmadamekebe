<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'prenom', 'nom', 'email', 'motdepasse', 'adresse', 'telephone',
    ];

    protected $hidden = [
        'motdepasse',
    ];
}
