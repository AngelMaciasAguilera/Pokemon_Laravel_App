<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PokemonController;



Route::resource('pokemon', PokemonController::class);

Route::get('/', [MainController::class, 'main'])-> name('main');
Route::get('login', [MainController::class, 'login'])-> name('login');
Route::get('logout', [MainController::class, 'logout'])-> name('logout');