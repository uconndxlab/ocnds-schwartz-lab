<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProteinController;
use App\Http\Controllers\PhosphorylationController;

Route::get('/', function () {
    return view('dashboard');
});

// Route to show all proteins
Route::get('/proteins', [ProteinController::class, 'index'])->name('proteins.index');

// Route to show all phosphorylations
Route::get('/phos', [PhosphorylationController::class, 'index'])->name('phosphorylations.index');

Route::get('/ion-channel-predictor', function () {
        return response()->file(public_path('scanx-okur-chung/build/index.html'));
})->name('ion-channel-predictor');

