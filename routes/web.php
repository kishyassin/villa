<?php

use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VillaController;

// Route for the home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
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

// Authentication routes
require __DIR__.'/auth.php';
