<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\paiementsController;
use App\Http\Controllers\authController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('master');
})->name('master');

Route::get('/produits', [paiementsController::class, 'index'])->name('produits.index');


Route::get('/auth', [authController::class, 'index1'])->name('auth.form');
Route::post('/auth', [authController::class, 'index'])->name('auth.login');

Route::get('/register', [authController::class, 'register1'])->name('auth.formes');

// Route pour traiter la soumission du formulaire d'inscription (POST)
Route::post('/register', [authController::class, 'register'])->name('auth.register');

Route::get('/paiements', [paiementsController::class, 'paiements'])->name('paiements');
Route::post('/paiements', [PaiementsController::class, 'processPaiement'])->name('processPaiement');

Route::get('/cart', [paiementsController::class, 'cart'])->name('cart');
Route::post('/cart', [paiementsController::class, 'cart1'])->name('layouts.cart');

Route::post('/vider-le-panier', [paiementsController::class, 'viderPanier']);

Route::get('/gestionnaire', [paiementsController::class, 'gestionnaire'])->name('gestionnaire');
Route::post('/gestionnaire', [paiementsController::class, 'gestionnaire1'])->name('layouts.gestionnaire');


Route::get('/produit', [paiementsController::class, 'produit'])->name('produit');
Route::post('/produit', [paiementsController::class, 'produit1'])->name('layouts.produit');
