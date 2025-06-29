<?php

use App\Livewire\User;
use App\Livewire\Produk;
use App\Livewire\Beranda;
use App\Livewire\Laporan;
use App\Livewire\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\File;

Route::get('/log', function () {
    $logPath = storage_path('logs/laravel.log');
    if (!File::exists($logPath)) {
        return 'Log file not found.';
    }
    return '<pre>' . File::get($logPath) . '</pre>';
});


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('livewire.home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', Beranda::class)->middleware(['auth'])->name('home');
Route::get('/user', User::class)->middleware(['auth'])->name('user');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/cetak', [App\Http\Controllers\HomeController::class, 'cetak'])->middleware(['auth'])->name('cetak');

require __DIR__.'/auth.php';

