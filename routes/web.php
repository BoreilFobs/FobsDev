<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Quote Request Routes (Public)
Route::get('/devis', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/devis', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/devis/success', [QuoteController::class, 'success'])->name('quote.success');

// Contact Form (Public) - Pour le formulaire du portfolio
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Dynamic portfolio detail pages
Route::get('/{slug}', function ($slug) {
    $portfolioItem = \App\Models\PortfolioItem::where('slug', $slug)->firstOrFail();
    return view('portfolio.show', compact('portfolioItem'));
})->where('slug', '^(?!admin|dashboard|devis|contact).*$')->name('portfolio.show');

// Dashboard Authentication Routes
Route::get('/admin/login', [DashboardController::class, 'login'])->name('login');
Route::post('/admin/login', [DashboardController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');

// Protected Dashboard Routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Portfolio Management
    Route::resource('portfolio', PortfolioItemController::class)->names([
        'index' => 'dashboard.portfolio.index',
        'create' => 'dashboard.portfolio.create',
        'store' => 'dashboard.portfolio.store',
        'show' => 'dashboard.portfolio.show',
        'edit' => 'dashboard.portfolio.edit',
        'update' => 'dashboard.portfolio.update',
        'destroy' => 'dashboard.portfolio.destroy',
    ]);
    
    // Portfolio Gallery Image Management
    Route::delete('/portfolio/{portfolio}/gallery/{index}', [PortfolioItemController::class, 'deleteGalleryImage'])
        ->name('dashboard.portfolio.deleteGalleryImage');
    Route::post('/portfolio/{portfolio}/gallery/reorder', [PortfolioItemController::class, 'reorderGallery'])
        ->name('dashboard.portfolio.reorderGallery');
    
    // Quote Management
    Route::get('/quotes', [QuoteController::class, 'index'])->name('dashboard.quotes.index');
    Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('dashboard.quotes.show');
    Route::patch('/quotes/{quote}/status', [QuoteController::class, 'updateStatus'])->name('dashboard.quotes.updateStatus');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('dashboard.quotes.destroy');
    
    // Contact Management
    Route::get('/contacts', [ContactController::class, 'index'])->name('dashboard.contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('dashboard.contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('dashboard.contacts.destroy');
    
    // Lead Management
    Route::resource('leads', LeadController::class)->names([
        'index' => 'dashboard.leads.index',
        'create' => 'dashboard.leads.create',
        'store' => 'dashboard.leads.store',
        'show' => 'dashboard.leads.show',
        'edit' => 'dashboard.leads.edit',
        'update' => 'dashboard.leads.update',
        'destroy' => 'dashboard.leads.destroy',
    ]);
    Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('dashboard.leads.updateStatus');
    Route::post('/leads/bulk-update', [LeadController::class, 'bulkUpdate'])->name('dashboard.leads.bulkUpdate');
    
    // Push Notification Management
    Route::get('/notifications', function() {
        return view('dashboard.notifications');
    })->name('dashboard.notifications');
    Route::post('/notifications/register-device', [App\Http\Controllers\NotificationController::class, 'registerDevice'])
        ->name('dashboard.notifications.register');
    Route::post('/notifications/unregister-device', [App\Http\Controllers\NotificationController::class, 'unregisterDevice'])
        ->name('dashboard.notifications.unregister');
    Route::post('/notifications/test', [App\Http\Controllers\NotificationController::class, 'testNotification'])
        ->name('dashboard.notifications.test');
});
