<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/tv-show', [TvController::class, 'index'])->name('tv.index');
Route::get('/tv-show/{id}', [TvController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/{id}', [ActorController::class, 'show'])->name('actor.show');
Route::view('creator', 'creator');
