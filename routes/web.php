<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [PageController::class, 'products'])->name('products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin dashboard (protected)
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Resource routes for all admin sections
    Route::resource('carousel', AdminController::class)->only(['index', 'update']);
    Route::resource('brands', AdminController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('promo', AdminController::class)->only(['index', 'update']);
    Route::resource('featured-products', AdminController::class)->only(['index', 'update']);
    Route::resource('testimonials', AdminController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('gallery', AdminController::class)->only(['index', 'update']);
    Route::resource('faqs', AdminController::class)->only(['index', 'update']);
    Route::put('faq-products/{id}', [AdminController::class, 'faqProductsUpdate'])->name('faq-products.update');
    Route::resource('about-us', AdminController::class)->only(['index', 'update']);
    Route::put('about-us-image/{id}', [AdminController::class, 'aboutUsImageUpdate'])->name('about-us-image.update');
    Route::resource('products', AdminController::class)->only(['index', 'store', 'update', 'destroy']);
});

require __DIR__.'/auth.php';
