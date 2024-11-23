<?php
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route pour la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route pour le tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route pour la page "Properties"
Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
Route::get('/properties', function () {
    return view('properties'); // Assurez-vous que le fichier existe dans resources/views/
})->name('properties');

Route::get('contact', function () {
    return view('contact');
})->name('contact_us');

// Authentification (routes générées par Laravel Breeze ou Jetstream)
require __DIR__.'/auth.php';
