<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->isBeheerder()) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->isAanbieder()) {
        return redirect()->route('aanbieder.dashboard');
    }

    abort(403);
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'role:Beheerder'])->group(function () {
    Route::get('/admin-dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Aanbieder'])->group(function () {
    Route::get('/aanbieder-dashboard', fn () => view('aanbieder.dashboard'))->name('aanbieder.dashboard');

    Route::get('/aanbieder/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/aanbieder/cars/check-kenteken', [CarController::class, 'checkKenteken'])->name('cars.check');
    Route::post('/aanbieder/cars', [CarController::class, 'store'])->name('cars.store');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('cars', CarController::class)->except(['index', 'create', 'store']);
    Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');
});

require __DIR__.'/auth.php';