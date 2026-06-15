<?php
use Illuminate\Support\Facades\Route;

Route::prefix('tenant')->middleware('web')->group(function () {
    Route::get('/dashboard', function () {
        return view('tenant.dashboard.dashboard');
    })->name('tenant.dashboard');

    Route::get('/room', function () {
        // Placeholder, you can create the view later
        return view('tenant.room.room');
    })->name('tenant.room');

    Route::get('/history', function () {
        return view('tenant.history.history');
    })->name('tenant.history');

    Route::get('/profil', function () {
        return view('tenant.profile.profil');
    })->name('tenant.profil');
});
?>