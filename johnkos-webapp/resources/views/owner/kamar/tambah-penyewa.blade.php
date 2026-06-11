@extends('app')

@section('title', 'Tambah Penyewa - JohnKos')
@section('header_title', 'Tambah Penyewa untuk Kamar ' . $kamar->nomor_kamar)

@section('content')
    <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay border border-card-border dark:border-dark-card-border">
        <form action="#" method="POST">
            @csrf
            <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">
            <div class="mb-6">
                <h3 class="text-xl font-poppins font-semibold mb-4 border-b border-card-border dark:border-dark-card-border pb-2">Informasi Penyewa</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2">
                    <div class="mb-5">
                        <label for="nama_penyewa" class="block font-semibold mb-2 text-sm">Nama Lengkap</label>
                        <input type="text" name="nama_penyewa" id="nama_penyewa" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Nama lengkap penyewa" required>
                    </div>
                    <div class="mb-5">
                        <label for="telepon_penyewa" class="block font-semibold mb-2 text-sm">Nomor Telepon</label>
                        <input type="tel" name="telepon_penyewa" id="telepon_penyewa" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="0812xxxxxxxx" required>
                    </div>
                    <div class="mb-5">
                        <label for="tanggal_masuk" class="block font-semibold mb-2 text-sm">Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" id="tanggal_masuk" class="datepicker w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Pilih tanggal..." required>
                    </div>
                     <div class="mb-5">
                        <label for="tanggal_jatuh_tempo" class="block font-semibold mb-2 text-sm">Tanggal Jatuh Tempo Berikutnya</label>
                        <input type="text" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" class="datepicker w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Pilih tanggal..." required>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="history.back()" class="inline-flex items-center py-2 px-6 border border-muted dark:border-dark-muted rounded-full font-semibold font-sans text-muted dark:text-dark-muted hover:bg-gray-100 dark:hover:bg-dark-surface-hover transition-all">Batal</button>
                <button type="submit" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
                    Simpan Penyewa
                </button>
            </div>
        </form>
    </div>
@endsection
