<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantAuthController;
use App\Http\Controllers\TenantDedicatedController;
use App\Http\Controllers\PaymentController;

Route::middleware('guest')->group(function(){
    Route::get('tenant/login', [TenantAuthController::class, 'form'])->name('tenant.login.form');
    Route::post('tenant/login', [TenantAuthController::class, 'login'])->name('tenant.login.store');
});

Route::prefix('tenant')->middleware('auth:tenant')->group(function () {

    Route::post('tenant/logout', [TenantAuthController::class, 'logout'])
    ->name('tenant.login.destroy');

    Route::get('/dashboard', [TenantDedicatedController::class, 'dashboard'])->name('tenant.dashboard');
    Route::get('/room', [TenantDedicatedController::class, 'room'])->name('tenant.room');

    Route::get('/checkout/{occupancy}', [PaymentController::class, 'checkout'])->name('tenant.checkout');
    Route::post('/midtrans-callback', [PaymentController::class, 'callback'])->name('midtrans.callback');

    Route::get('/history', function () {
        return view('tenant.history.history');
    })->name('tenant.history');

    Route::get('/profil', function () {
        return view('tenant.profile.profil');
    })->name('tenant.profil');
});
?>