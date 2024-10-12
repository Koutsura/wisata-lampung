<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route::get('/pesanan', function () {
    return view('cara_pesanan');
})->name('pesanan'); */

Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan');















Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');


    Route::get('/tiska', [App\Http\Controllers\TiskaController::class, 'index'])->name('tiska.index');
    Route::get('/tiska/create', [App\Http\Controllers\TiskaController::class, 'create'])->name('tiska.create');
    Route::post('/tiska/store', [App\Http\Controllers\TiskaController::class, 'store'])->name('tiska.store');
    Route::get('/tiska/edit/{id}', [App\Http\Controllers\TiskaController::class, 'edit'])->name('tiska.edit');
    Route::put('/tiska/update/{id}', [App\Http\Controllers\TiskaController::class, 'update'])->name('tiska.update');
    Route::delete('/tiska/delete/{id}', [App\Http\Controllers\TiskaController::class, 'destroy'])->name('tiska.delete');

    Route::get('/marina', [App\Http\Controllers\MarinaController::class, 'index'])->name('marina.index');
    Route::get('/marina/create', [App\Http\Controllers\MarinaController::class, 'create'])->name('marina.create');
    Route::post('/marina/store', [App\Http\Controllers\MarinaController::class, 'store'])->name('marina.store');
    Route::get('/marina/edit/{id}', [App\Http\Controllers\MarinaController::class, 'edit'])->name('marina.edit');
    Route::put('/marina/update/{id}', [App\Http\Controllers\MarinaController::class, 'update'])->name('marina.update');
    Route::delete('/marina/delete/{id}', [App\Http\Controllers\MarinaController::class, 'destroy'])->name('marina.delete');

    Route::get('/kedu_warna', [App\Http\Controllers\KeduWarnaController::class, 'index'])->name('kedu_warna.index');
    Route::get('/kedu_warna/create', [App\Http\Controllers\KeduWarnaController::class, 'create'])->name('kedu_warna.create');
    Route::post('/kedu_warna/store', [App\Http\Controllers\KeduWarnaController::class, 'store'])->name('kedu_warna.store');
    Route::get('/kedu_warna/edit/{id}', [App\Http\Controllers\KeduWarnaController::class, 'edit'])->name('kedu_warna.edit');
    Route::put('/kedu_warna/update/{id}', [App\Http\Controllers\KeduWarnaController::class, 'update'])->name('kedu_warna.update');
    Route::delete('/kedu_warna/delete/{id}', [App\Http\Controllers\KeduWarnaController::class, 'destroy'])->name('kedu_warna.delete');

    Route::get('/sanggar', [App\Http\Controllers\SanggarController::class, 'index'])->name('sanggar.index');
    Route::get('/sanggar/create', [App\Http\Controllers\SanggarController::class, 'create'])->name('sanggar.create');
    Route::post('/sanggar/store', [App\Http\Controllers\SanggarController::class, 'store'])->name('sanggar.store');
    Route::get('/sanggar/edit/{id}', [App\Http\Controllers\SanggarController::class, 'edit'])->name('sanggar.edit');
    Route::put('/sanggar/update/{id}', [App\Http\Controllers\SanggarController::class, 'update'])->name('sanggar.update');
    Route::delete('/sanggar/delete/{id}', [App\Http\Controllers\SanggarController::class, 'destroy'])->name('sanggar.delete');
