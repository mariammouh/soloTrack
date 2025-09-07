<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AutoentrepreneurController;
use App\Http\Controllers\BonDeCommandeController;
use Illuminate\Support\Facades\Route;
use App\Models\AutoEntrepreneur;
use App\Models\User;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FournisseureController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\DevisController;
use App\Models\bonDeCommande;
use App\Http\Controllers\DepenseController;
use App\Admin\Controllers\HomeController as HomeController;
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


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
///my homie pagie
Route::get('/', function () {
    return view('home/index');
})->name('home');
Route::get('/about', function () {
    return view('home.about');
})->name('about');
Route::get('/why', function () {
    return view('home.why');
})->name('why');
Route::get('/service', function () {
    return view('home.service');
})->name('service');
Route::get('/team', function () {
    return view('home.team');
})->name('team');
//end my homie pagie

Route::get('/admin/autoentrepreneur', function () {
    return view('admin.autoentrepreneurs');
})->name('admin.autoentrepreneurs');
Route::middleware('auth')->group(function () {
    Route::get('/produits/{id}', [ProduitController::class, 'index'])->name('produits');
    Route::patch('/produits/{id_produit}', [ProduitController::class, 'update'])->name('produits.update');
    Route::post('/produits/{id}', [ProduitController::class, 'store'])->name('produits.add');
    Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/fournisseures/{id}', [FournisseureController::class, 'index'])->name('fournisseures');
    Route::patch('/fournisseures/{id_produit}', [FournisseureController::class, 'update'])->name('fournisseures.update');
    Route::post('/fournisseures/{id}', [FournisseureController::class, 'store'])->name('fournisseures.add');
    Route::delete('/fournisseures/{id_f}', [FournisseureController::class, 'destroy'])->name('fournisseures.destroy');
    Route::post('/fournisseures/categorie/{id}', [FournisseureController::class, 'addCategorie'])->name('fournisseures.addCategorie');
    Route::post('/fournisseures/recherche/{id}', [FournisseureController::class, 'recherche'])->name('fournisseures.recherche');

});  
Route::middleware('auth')->group(function () {
    Route::get('/clients/{id}', [ClientController::class, 'index'])->name('clients');
    Route::patch('/clients/{id_client}', [ClientController::class, 'update'])->name('clients.update');
    Route::post('/clients/{id}', [ClientController::class, 'store'])->name('clients.add');
    Route::delete('/clients/{id_client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/download-pdf/{parameters}', [ClientController::class, 'downloadPDF'])->name('clients.download.pdf');
    Route::post('/clients/recherche/{id}', [ClientController::class, 'recherche'])->name('clients.recherche');

});  
Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/autoentrepreneur', [HomeController::class, 'getAutoentrepreneurs'])->name('admin.autoentrepreneurs');
Route::get('/admin/profile', [HomeController::class, 'getprofile'])->name('admin.profile');
Route::post('/admin/autoentrepreneur', [HomeController::class, 'recherche'])->name('admin.recherche');
Route::patch('/admin/profile', [HomeController::class, 'updateProfile'])->name('admin.profile.update');
Route::patch('/admin/profile/password', [HomeController::class, 'updatePasse'])->name('admin.password.update');

Route::post('/admin/profile/consultation{id}', [HomeController::class, 'consultation'])->name('admin.consultation.reply');

// Route::middleware('auth')->group(function () {
//     Route::get('/ventes/{id}', [VenteController::class, 'index'])->name('ventes');
//     Route::post('/ventes/{id}', [VenteController::class, 'store'])->name('ventes.add');
//     Route::post('/ventes/client/{id}', [VenteController::class, 'storeclient'])->name('ventes.addClient');
//     Route::post('/ventes/Produit/{id}', [VenteController::class, 'storeProduit'])->name('ventes.addProduit');

//     Route::delete('/ventes/{id_vente}', [VenteController::class, 'destroy'])->name('ventes.destroy');
//     Route::get('/download-pdf/{parameters}', [VenteController::class, 'downloadPDF'])->name('vente.download.pdf');
// });
Route::middleware('auth')->group(function () {
    Route::get('/bonDeCommande/{id}', [BonDeCommandeController::class, 'index'])->name('bon_de_commandes');
    Route::get('/bonDeCommande/add/{id}', [BonDeCommandeController::class, 'create'])->name('bon_de_commandes.add');

    Route::post('/bonDeCommande/{id}', [BonDeCommandeController::class, 'store'])->name('bon_de_commandes.store');

    Route::delete('/bonDeCommande/{id}', [BonDeCommandeController::class, 'destroy'])->name('bon_de_commandes.destroy');
    Route::patch('/bonDeCommande/{id}', [BonDeCommandeController::class, 'update'])->name('bon_de_commandes.update');

    Route::get('/bonDeCommande/download-pdf/{id}', [BonDeCommandeController::class, 'downloadPDF'])->name('bon_de_commandes.download.pdf');
});
Route::middleware('auth')->group(function () {
    Route::get('/devis/{id}', [DevisController::class, 'index'])->name('devis');
    Route::post('/devis/add/{id}', [DevisController::class, 'store'])->name('devis.store');
    Route::get('/devis/add/{id}', [DevisController::class, 'create'])->name('devis.add');

    Route::post('/devis/{id}', [DevisController::class, 'recherche'])->name('devis.recherche');

    Route::get('/devis/download-pdf/{id}', [DevisController::class, 'downloadPDF'])->name('devis.download.pdf');
    Route::delete('/devis/{id_vente}', [DevisController::class, 'destroy'])->name('devis.destroy');
    Route::patch('/devis/{id_vente}', [DevisController::class, 'update'])->name('devis.update');
});
Route::middleware('auth')->group(function () {
    Route::get('/depenses/{id}', [DepenseController::class, 'index'])->name('depenses');
    Route::post('/depenses/{id}', [DepenseController::class, 'store'])->name('depenses.add');

    Route::patch('/depenses{id}', [DepenseController::class, 'update'])->name('depenses.update');
    Route::delete('/depenses{id}', [DepenseController::class, 'destroy'])->name('depenses.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/contact',  function () {
    return view('contact');
})->name('contact');
Route::post('/contact/{id}', [DashboardController::class, 'contact'])->name('contact.submit');
require __DIR__.'/auth.php';
