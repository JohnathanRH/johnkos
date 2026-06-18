<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OccupancyController;

Route::prefix('owner')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KostController::class, 'index'])->name('owner.dashboard');

    // Kamar Routes
    Route::get('/kamar', [KamarController::class, 'index'])->name('owner.kamar.index');
    Route::get('/kamar/create', [KamarController::class, 'create'])->name('owner.kamar.create');
    Route::post('/kamar', [KamarController::class, 'store'])->name('owner.kamar.store');
    Route::get('/kamar/{kamar}', [KamarController::class, 'show'])->name('owner.kamar.show');
    Route::get('/kamar/{kamar}/edit', [KamarController::class, 'edit'])->name('owner.kamar.edit');
    Route::put('/kamar/{kamar}', [KamarController::class, 'update'])->name('owner.kamar.update');

    // Penyewa Routes
    Route::get('/penyewa', [TenantController::class, 'index'])->name('owner.penyewa.index');
    Route::get('/kamar/{kamar}/tambah-penyewa', [OccupancyController::class, 'assignment'])->name('owner.kamar.tambah-penyewa');

    Route::get('/tenant/{tenant}', [TenantController::class, 'show'])->name('owner.penyewa.show');

    Route::get('/penyewa/{id}/edit', function ($id) {
        // Dummy data for example
        $penyewa = (object)[
            'id' => $id,
            'nama' => 'Ahmad Budi',
            'telepon' => '081234567890',
            'tanggal_masuk' => '2023-01-15',
            'tanggal_jatuh_tempo' => '2023-12-15',
        ];
        return view('owner.penyewa.edit-penyewa', ['penyewa' => $penyewa]);
    })->name('owner.penyewa.edit');

    // Other Owner Routes
    Route::get('/riwayat', function () {
        return view('owner.riwayat.daftar-riwayat');
    })->name('owner.riwayat.index');

    Route::get('/profil', function () {
        return view('owner.profil.halaman-profil');
    })->name('owner.profil');
});

?>