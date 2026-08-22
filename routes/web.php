<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\RaffleApplication;
use App\Livewire\Auth;
use App\Livewire\Page;

Route::get('/login', Auth\Login::class)->middleware('guest')->name('login');

Route::middleware('auth')->group(function() {

    Route::get('/admin/raffle', Page\Admin\Raffle::class)->name('admin.raffle');

});

Route::get('/', RaffleApplication::class)->name('home');