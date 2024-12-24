<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';

    protected $fillable = [
        'nom',
        'prix',
        'quantite',
        'image',
        'id_paiement', // clé étrangère
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_paiement'); // clé étrangère
    }
}
