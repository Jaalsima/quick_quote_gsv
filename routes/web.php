<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuotationController;


Route::get('/',         [HomeController::class, 'welcome'])->name('welcome');
Route::get('/help',    [HomeController::class, 'help'])->name('help');
Route::get('/settings',     [HomeController::class, 'settings'])->name('settings');
Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/manual',    [HomeController::class, 'manual'])->name('manual');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('quotations', [QuotationController::class, 'index'])->name('quotations');
    Route::get('/quotations/create', [QuotationController::class, 'create'])->name('quotations.create');
    Route::post('/quotations/store', [QuotationController::class, 'store'])->name('quotations.store');
    Route::get('/quotations/{quotation}', [QuotationController::class, 'show'])->name('quotations.show');
    Route::get('/quotations/{quotation}/edit', [QuotationController::class, 'edit'])->name('quotations.edit');
    Route::put('/quotations/{quotation}/update', [QuotationController::class, 'update'])->name('quotations.update');
    Route::delete('/quotations/{quotation}/delete', [QuotationController::class, 'destroy'])->name('quotations.destroy');
});
