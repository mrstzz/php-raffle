<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\RaffleApplication;
use App\Livewire\Auth;

Route::get('/login', Auth\Login::class)
    ->middleware('guest')    
    ->name('login');

Route::middleware('auth')->group(function() {

    Route::get('/', RaffleApplication::class)
        ->name('home');

});