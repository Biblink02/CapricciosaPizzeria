<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenusController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/menus',[MenusController::class, 'index'])->name('menus');
Route::get('/images/{path}', [ImageController::class, 'index'])->name('image');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
