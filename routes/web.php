<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/',         [HomeController::class, 'welcome'])->name('welcome');
Route::get('/about',    [HomeController::class, 'about'])->name('about');
Route::get('/blog',     [HomeController::class, 'blog'])->name('blog');
Route::get('/contact',  [HomeController::class, 'contact'])->name('contact');
Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/terms',    [HomeController::class, 'terms'])->name('terms');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
