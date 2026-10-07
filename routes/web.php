<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Owner\AuthController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\ProductController as OwnerProductController;
use App\Http\Controllers\Owner\CategoryController as OwnerCategoryController;
use App\Http\Controllers\Owner\TestimonialController as OwnerTestimonialController;
use App\Http\Controllers\Owner\InquiryController as OwnerInquiryController;
use App\Http\Controllers\Owner\SoftwareDownloadController as OwnerSoftwareDownloadController;

// Public Front-end Routes
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/search-suggestions', [ProductController::class, 'suggestions'])->name('products.suggestions');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/downloads', [ProductController::class, 'downloads'])->name('downloads');
Route::get('/contact', [ProductController::class, 'contact'])->name('contact');
Route::post('/contact', [ProductController::class, 'storeInquiry'])->name('contact.store')->middleware('throttle:5,1');

// Review Submission
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Guest Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated Owner Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('owner')->name('owner.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Products Management
        Route::delete('products/gallery-image/{id}', [OwnerProductController::class, 'deleteGalleryImage'])->name('products.gallery-image.destroy');
        Route::resource('products', OwnerProductController::class)->except(['show']);

        // Categories Management
        Route::resource('categories', OwnerCategoryController::class)->except(['show', 'create']);

        // Software Downloads Management
        Route::post('downloads/{id}/toggle-active', [OwnerSoftwareDownloadController::class, 'toggleActive'])->name('downloads.toggle-active');
        Route::resource('downloads', OwnerSoftwareDownloadController::class)->except(['show']);

        // Testimonials Management
        Route::get('testimonials', [OwnerTestimonialController::class, 'index'])->name('testimonials.index');
        Route::post('testimonials/{id}/toggle-approve', [OwnerTestimonialController::class, 'toggleApprove'])->name('testimonials.toggle-approve');
        Route::delete('testimonials/{id}', [OwnerTestimonialController::class, 'destroy'])->name('testimonials.destroy');

        // Inquiries Management
        Route::get('inquiries', [OwnerInquiryController::class, 'index'])->name('inquiries.index');
        Route::post('inquiries/{id}/toggle-read', [OwnerInquiryController::class, 'toggleRead'])->name('inquiries.toggle-read');
        Route::delete('inquiries/{id}', [OwnerInquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Settings / Security
        Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
        Route::put('/settings/password', [DashboardController::class, 'updatePassword'])->name('settings.password');
    });
});
