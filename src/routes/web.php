<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AllergensController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PdfmenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/menus',[MenusController::class, 'index'])->name('menus');
Route::get('/allergens',[AllergensController::class, 'index'])->name('allergens-table');
Route::get('/images/{path}', [ImageController::class, 'index'])->name('image');
Route::get('/pdf/{path}',[PdfmenuController::class, 'getSpecificMenu'])->name('pdf-menu-specific');
Route::get('/menus/pdf/{lang}', [PdfmenuController::class, 'getFirstVisibleMenu'])->name('pdf-menu');
Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'));
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
