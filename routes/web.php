<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use Illuminate\Support\Facades\Route;

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

//projet

Route::get('/create',[ProjetController::class, 'create'])->name('projet.create');
Route::get('/liste',[ProjetController::class, 'list'])->name('projet.list');
Route::post('/store',[ProjetController::class, 'store'])->name('projet.store');
Route::get('/edit/{id}',[ProjetController::class, 'edit'])->name('projet.edit');
Route::post('/update/traitement', [ProjetController::class, 'update'])->name('projet.update');
Route::get('/delete/{id}', [ProjetController::class, 'delete'])->name('projet.delete');


Route::get('/index', function () {
    return view('projet.index');
});

require __DIR__.'/auth.php';
