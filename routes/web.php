<?php

use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\LaporanAdmin;
use App\Livewire\Auth\Login;
use App\Livewire\User\DashboardUser;
use App\Livewire\User\LaporanUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === "admin") {
            return redirect()->route("admin.dashboard");
        } else {
            return redirect()->route("user.dashboard");
        }
    } else {
        return redirect()->route('login');
    }
})->name('index');

Route::get('/auth/login', Login::class)->name('login');

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', DashboardAdmin::class)->name('dashboard');
    Route::get('/laporan', LaporanAdmin::class)->name('laporan');
});

Route::prefix('user')->middleware(['auth', 'user'])->name('user.')->group(function () {
    Route::get('/', DashboardUser::class)->name('dashboard');
    Route::get('/laporan', LaporanUser::class)->name('laporan');
});

Route::prefix('error')->name('error.')->group(function () {
    Route::get('/403', function () {
        return view('components.errors.403');
    })->name('403');
});
