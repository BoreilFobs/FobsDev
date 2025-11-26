<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Quote Request Routes (Public)
Route::get('/devis', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/devis', [QuoteController::class, 'store'])->name('quote.store');
Route::get('/devis/success', [QuoteController::class, 'success'])->name('quote.success');

// Dynamic portfolio detail pages
Route::get('/{slug}', function ($slug) {
    $portfolioItem = \App\Models\PortfolioItem::where('slug', $slug)->firstOrFail();
    return view('portfolio.show', compact('portfolioItem'));
})->where('slug', '^(?!admin|dashboard|devis).*$')->name('portfolio.show');

// Dashboard Authentication Routes
Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
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
    
    // Quote Management
    Route::get('/quotes', [QuoteController::class, 'index'])->name('dashboard.quotes.index');
    Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('dashboard.quotes.show');
    Route::patch('/quotes/{quote}/status', [QuoteController::class, 'updateStatus'])->name('dashboard.quotes.updateStatus');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('dashboard.quotes.destroy');
});
