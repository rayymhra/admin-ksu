<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

    // Carousel routes
    Route::get('carousel', [AdminController::class, 'carouselIndex'])->name('carousel.index');
    Route::put('carousel/{id}', [AdminController::class, 'carouselUpdate'])->name('carousel.update');

    // Brands routes
    Route::get('brands', [AdminController::class, 'brandsIndex'])->name('brands.index');
    Route::post('brands', [AdminController::class, 'brandsStore'])->name('brands.store');
    Route::put('brands/{id}', [AdminController::class, 'brandsUpdate'])->name('brands.update');
    Route::delete('brands/{id}', [AdminController::class, 'brandsDestroy'])->name('brands.destroy');

    // Promo routes
    Route::get('promo', [AdminController::class, 'promoIndex'])->name('promo.index');
    Route::put('promo/{id}', [AdminController::class, 'promoUpdate'])->name('promo.update');

    // Featured Products routes
    Route::get('featured-products', [AdminController::class, 'featuredProductsIndex'])->name('featured-products.index');
    Route::put('featured-products/{id}', [AdminController::class, 'featuredProductsUpdate'])->name('featured-products.update');

    // Testimonials routes
    Route::get('testimonials', [AdminController::class, 'testimonialsIndex'])->name('testimonials.index');
    Route::post('testimonials', [AdminController::class, 'testimonialsStore'])->name('testimonials.store');
    Route::put('testimonials/{id}', [AdminController::class, 'testimonialsUpdate'])->name('testimonials.update');
    Route::delete('testimonials/{id}', [AdminController::class, 'testimonialsDestroy'])->name('testimonials.destroy');

    // Gallery routes
    Route::get('gallery', [AdminController::class, 'galleryIndex'])->name('gallery.index');
    Route::put('gallery/{id}', [AdminController::class, 'galleryUpdate'])->name('gallery.update');

    // FAQs routes
    Route::get('faqs', [AdminController::class, 'faqsIndex'])->name('faqs.index');
    Route::put('faqs/{id}', [AdminController::class, 'faqsUpdate'])->name('faqs.update');
    Route::put('faq-products/{id}', [AdminController::class, 'faqProductsUpdate'])->name('faq-products.update');

    // About Us routes
    Route::get('about-us', [AdminController::class, 'aboutUsIndex'])->name('about-us.index');
    Route::put('about-us/{id}', [AdminController::class, 'aboutUsUpdate'])->name('about-us.update');
    Route::put('about-us-image/{id}', [AdminController::class, 'aboutUsImageUpdate'])->name('about-us-image.update');

    // Products routes
    Route::get('products', [AdminController::class, 'productsIndex'])->name('products.index');
    Route::post('products', [AdminController::class, 'productsStore'])->name('products.store');
    Route::put('products/{id}', [AdminController::class, 'productsUpdate'])->name('products.update');
    Route::delete('products/{id}', [AdminController::class, 'productsDestroy'])->name('products.destroy');
});

require __DIR__.'/auth.php';
