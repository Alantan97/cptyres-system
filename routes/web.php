<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('customers')->as('customers.')->controller(CustomerController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{customer}/show', 'show')->name('show');
    Route::get('/{customer}/edit', 'edit')->name('edit');
    Route::put('/{customer}/update', 'update')->name('update');
    Route::delete('/{customer}/delete', 'destroy')->name('destroy');
});

Route::prefix('vehicles')->as('vehicles.')->controller(VehicleController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{vehicle}/show', 'show')->name('show');
    Route::get('/{vehicle}/edit', 'edit')->name('edit');
    Route::put('/{vehicle}/update', 'update')->name('update');
    Route::delete('/{vehicle}/delete', 'destroy')->name('destroy');
});

require __DIR__ . '/auth.php';
