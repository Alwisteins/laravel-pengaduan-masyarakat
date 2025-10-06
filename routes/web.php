<?php

use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\LaporanAdmin;
use App\Livewire\Front\Konten\Grafik;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Front\Konten\LaporanForm;
use App\Livewire\Front\Konten\LaporanFront;
use App\Livewire\Umum\Profile;
use App\Livewire\User\CreateLaporan;
use App\Livewire\User\DashboardUser;
use App\Livewire\User\EditLaporan;
use App\Livewire\User\LaporanUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('front.')->group(function () {
    Route::get('grafik', Grafik::class)->name('grafik');
    Route::get('form/laporan/baru', LaporanForm::class)->name('form.laporan.baru');
    Route::get('list-laporan', LaporanFront::class)->name('list.laporan');
});

Route::get('/', function () {
    // if (Auth::check()) {
    //     if (Auth::user()->role === "admin") {
    //         return redirect()->route("admin.dashboard");
    //     } else {
    //         return redirect()->route("user.dashboard");
    //     }
    // } else {
    //     return redirect()->route('login');
    // }
    return redirect()->route('front.grafik');
})->name('index');

Route::get('/auth/login', Login::class)->name('login');
Route::get('/auth/logout', Logout::class)->name('logout');

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', DashboardAdmin::class)->name('dashboard');
    Route::get('/laporan', LaporanAdmin::class)->name('laporan');
});

Route::prefix('user')->middleware(['auth', 'user'])->name('user.')->group(function () {
    Route::get('/', DashboardUser::class)->name('dashboard');
    Route::get('/laporan', LaporanUser::class)->name('laporan');
    Route::get('/laporan/new', CreateLaporan::class)->name('laporan.create');
    Route::get('/laporan/{id}/edit', EditLaporan::class)->name('laporan.edit');
    Route::get('/my-profile', Profile::class)->name('profile');
});

Route::prefix('error')->name('error.')->group(function () {
    Route::get('/403', function () {
        return view('components.errors.403');
    })->name('403');
});
