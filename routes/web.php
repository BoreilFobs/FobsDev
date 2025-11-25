<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Dynamic portfolio detail pages
Route::get('/{slug}', function ($slug) {
    $portfolioItem = \App\Models\PortfolioItem::where('slug', $slug)->firstOrFail();
    return view('portfolio.show', compact('portfolioItem'));
})->where('slug', '^(?!admin|dashboard).*$')->name('portfolio.show');

// Dashboard Authentication Routes
Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [DashboardController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');

// Protected Dashboard Routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('portfolio', PortfolioItemController::class)->names([
        'index' => 'dashboard.portfolio.index',
        'create' => 'dashboard.portfolio.create',
        'store' => 'dashboard.portfolio.store',
        'show' => 'dashboard.portfolio.show',
        'edit' => 'dashboard.portfolio.edit',
        'update' => 'dashboard.portfolio.update',
        'destroy' => 'dashboard.portfolio.destroy',
    ]);
});
