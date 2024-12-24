<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $table = 'paiements';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'total',
        'method',
        'status',
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_paiement'); // clé étrangère
    }
}
