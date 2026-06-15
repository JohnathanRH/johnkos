<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;

Route::prefix('owner')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KostController::class, 'index'])->name('owner.dashboard');

    // Kamar Routes
    Route::get('/kamar', function () {
        return view('owner.kamar.daftar-kamar');
    })->name('owner.kamar.index');

    Route::get('/kamar/tambah', function () {
        return view('owner.kamar.tambah-kamar');
    })->name('owner.kamar.tambah');

    Route::get('/kamar/{id}', function ($id) {
        // Dummy data for example
        $kamar = (object)[
            'id' => $id,
            'nomor_kamar' => '0' . $id,
            'status' => $id == 1 ? 'Terisi' : 'Kosong',
            'harga' => 1500000,
            'fasilitas' => 'AC, Kamar Mandi Dalam',
            'penghuni' => $id == 1 ? (object)[
                'id' => 1,
                'nama' => 'Ahmad Budi',
                'tanggal_masuk' => '2023-01-15',
                'tanggal_jatuh_tempo' => '2023-12-15'
            ] : null
        ];
        return view('owner.kamar.detail-kamar', ['kamar' => $kamar]);
    })->name('owner.kamar.show');

    Route::get('/kamar/{id}/edit', function ($id) {
        // Dummy data for example
        $kamar = (object)[
            'id' => $id,
            'nomor_kamar' => '0' . $id,
            'lantai' => 1,
            'harga' => 1500000,
            'fasilitas' => 'AC, Kamar Mandi Dalam',
        ];
        return view('owner.kamar.edit-kamar', ['kamar' => $kamar]);
    })->name('owner.kamar.edit');

    Route::get('/kamar/{id}/tambah-penyewa', function ($id) {
        // Dummy data for example
        $kamar = (object)[
            'id' => $id,
            'nomor_kamar' => '0' . $id,
        ];
        return view('owner.kamar.tambah-penyewa', ['kamar' => $kamar]);
    })->name('owner.kamar.tambah-penyewa');


    // Penyewa Routes
    Route::get('/penyewa', function () {
        return view('owner.penyewa.daftar-penyewa');
    })->name('owner.penyewa.index');

    Route::get('/penyewa/{id}', function ($id) {
        // Dummy data for example
        $penyewa = (object)[
            'id' => $id,
            'nama' => 'Ahmad Budi',
            'telepon' => '081234567890',
            'tanggal_masuk' => '2023-01-15',
            'tanggal_jatuh_tempo' => '2023-12-15',
            'kamar_id' => 1,
            'kamar_nomor' => '01'
        ];
        return view('owner.penyewa.detail-penyewa', ['penyewa' => $penyewa]);
    })->name('owner.penyewa.show');

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