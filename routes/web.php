<?php

use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;

// Route for the home page
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard route
Route::get('/dashboard', function () {
    // Récupérez l'utilisateur authentifié
    $user = Auth::user();
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Protected routes with 'auth' middleware
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Stripe payment routes
    Route::prefix('stripe')->name('stripe.')->group(function () {
        Route::post('/session', [StripeController::class, 'session'])->name('session');
        Route::get('/success', [StripeController::class, 'success'])->name('success');
        Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
    });

    // Confirmation route
    Route::get('/confirmation', [StripeController::class, 'confirmationPage'])->name('confirmation');
});

// Public routes for properties and contact
Route::get('/properties', function () {
    return view('properties');
})->name('properties');

// Villa routes
Route::resource('villas', VillaController::class)->only(['show']);

// Contact page route
Route::get('contact', function () {
    return view('contact');
})->name('contact_us');



// Afficher la page d'inscription
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Gérer la soumission du formulaire d'inscription
Route::post('/register', [RegisteredUserController::class, 'store']);

// Authentication routes
require __DIR__.'/auth.php';
