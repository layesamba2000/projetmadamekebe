<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ID de l'utilisateur
        'product_id', // ID du produit ajouté au panier
        'quantite', // Quantité
        'prix', // Prix
    ];
}


