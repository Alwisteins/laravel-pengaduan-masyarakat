<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Laporan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', Home::class)->name('admin.dashboard');
Route::get('/laporan', Laporan::class)->name('laporan');

Route::get('/auth/login', Login::class)->name('login');