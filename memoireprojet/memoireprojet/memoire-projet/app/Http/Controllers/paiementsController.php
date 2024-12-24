<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Produit;
use App\Models\Cart;

class PaiementsController extends Controller
{
    // Affiche le panier de l'utilisateur
    public function cart()
    {
        return view('layouts.cart');
    }

    // Affiche la page de paiement avec le total
    public function cart1(Request $request)
    {
        $total = $request->input('total');
        return view('layouts.paiements', compact('total'));
    }

    // Affiche la page de paiement avec le total récupéré depuis la query string
    public function paiements(Request $request)
    {
        $total = $request->query('total');
        return view('layouts.paiements', ['total' => $total]);
    }

    // Traite le paiement
    public function processPaiement(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:500',
            'total' => 'required|numeric|min:0', // Total doit être un nombre positif
            'method' => 'required|in:wave,orange', // Méthode de paiement
        ]);
    
        try {
            $total = floatval(preg_replace('/[^0-9.]/', '', $validatedData['total']));
    
            // Créer un paiement
            $paiement = Paiement::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'adresse' => $validatedData['adresse'],
                'total' => $total,
                'method' => $validatedData['method'],
                'status' => 'pending', // Statut initial du paiement
            ]);
    
            // Traiter les produits du panier
            if ($request->session()->has('cart')) {
                \Log::info('Cart contents: ', $request->session()->get('cart'));
                foreach ($request->session()->get('cart') as $item) {
                    $paiement->produits()->create([
                        'nom' => $item['name'],
                        'prix' => $item['price'],
                        'quantite' => $item['quantity'],
                        'image' => $item['image'],
                    ]);
                }
                $request->session()->forget('cart'); // Vider le panier de la session
            } else {
                \Log::warning('Le panier est vide');
            }
            

            // Nettoyer le panier pour l'utilisateur connecté
            if (auth()->check()) {
                Cart::where('user_id', auth()->id())->delete();
            }
    
            return redirect()->route('produits.index')->with('message', 'Paiement réussi, produits ajoutés et panier vidé!');
        } catch (\Exception $e) {
            \Log::error('Erreur lors du paiement', [
                'message' => $e->getMessage(),
                'user_id' => auth()->id() ?? 'Guest',
                'cart' => $request->session()->get('cart'),
            ]);
            return back()->withErrors(['error' => 'Une erreur est survenue lors du traitement du paiement. Veuillez réessayer.']);
        }
    }
    
    // Fonction pour vider le panier via AJAX ou autre appel
    public function viderPanier()
    {
        // Vérifie si le panier existe dans la session et le vide
        session()->forget('cart');

        // Retourner une réponse JSON avec un message de succès
        return response()->json(['message' => 'Le panier a été vidé']);
    }

    // Affiche la page pour le gestionnaire
    public function gestionnaire()
    {
        return view('auth.gestionnaire');  // Assurez-vous que la vue 'auth.gestionnaire' existe
    }

    public function index()
    {
        return view('produits.index');
    }


}
