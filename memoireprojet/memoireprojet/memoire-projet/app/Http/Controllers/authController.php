<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function index1()
    {
        return view('auth.login');  // Assurez-vous que la vue 'auth.login' existe
    }

    // Afficher le formulaire d'inscription
    public function register1()
    {
        return view('auth.register'); // Assurez-vous d'avoir une vue auth/register.blade.php
    }

    // Traiter l'inscription
    public function register(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|string|email|unique:clients',
            'motdepasse' => 'required|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
        ]);

        $client = new Client;
        $client->prenom = $request->prenom;
        $client->nom = $request->nom;
        $client->email = $request->email;
        $client->motdepasse = Hash::make($request->motdepasse); // Correction ici
        $client->adresse = $request->adresse;
        $client->telephone = $request->telephone;
        $client->save();

    return redirect()->route('produits.index')->with('success', 'Utilisateur créé avec succès');
    }

    public function index(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|string|email',
            'motdepasse' => 'required|string',
        ]);
    
        // Trouver le client par email
        $client = Client::where('email', $request->email)->first();
    
        // Vérifier si le client existe et si le mot de passe est correct
        if ($client && Hash::check($request->motdepasse, $client->motdepasse)) {
            // Authentifier le client
            Auth::login($client);
    
            // Vérifier si l'email est celui de 'rokhayaf871@gmail.com'
            if ($client->email === 'rokhayaf871@gmail.com') {
                return redirect()->route('gestionnaire')->with('success', 'Bienvenue, gestionnaire !');
            }
    
            // Redirection par défaut pour les autres utilisateurs
            return redirect()->route('produits.index')->with('success', 'Connexion réussie');
        } else {
            return redirect()->back()->withErrors(['email' => 'Les informations d\'identification ne sont pas correctes']);
        }
    }
    
}
