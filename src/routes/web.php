<?php

use App\Http\Controllers\AllergensController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenusController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/menus',[MenusController::class, 'index'])->name('menus');
Route::get('/allergens',[AllergensController::class, 'index'])->name('allergens-table');
Route::get('/images/{path}', [ImageController::class, 'index'])->name('image');
/*Route::get('/who-are-we', [ImageController::class, 'index'])->name('who-are-we');*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /*
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    */
});
