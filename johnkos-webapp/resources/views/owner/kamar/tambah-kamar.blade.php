@extends('app')

@section('title', 'Tambah Kamar - JohnKos')
@section('header_title', 'Tambah Kamar Baru')

@section('content')
    <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay border border-card-border dark:border-dark-card-border">
        <form action="#" method="POST">
            @csrf
            <div class="mb-6">
                <h3 class="text-xl font-poppins font-semibold mb-3 border-b border-card-border dark:border-dark-card-border pb-2">Informasi Kamar</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <label for="nomor_kamar" class="block font-semibold mb-1 text-sm">Nomor Kamar</label>
                        <input type="text" name="nomor_kamar" id="nomor_kamar" class="w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Contoh: 1A">
                    </div>
                    <div>
                        <label for="lantai" class="block font-semibold mb-1 text-sm">Lantai</label>
                        <input type="number" name="lantai" id="lantai" class="w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Contoh: 1">
                    </div>
                    <div>
                        <label for="harga" class="block font-semibold mb-1 text-sm">Harga per Bulan (Rp)</label>
                        <input type="number" name="harga" id="harga" class="w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Contoh: 1500000">
                    </div>
                    <div>
                        <label for="fasilitas" class="block font-semibold mb-1 text-sm">Fasilitas</label>
                        <input type="text" name="fasilitas" id="fasilitas" class="w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Contoh: AC, Kamar Mandi Dalam">
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-poppins font-semibold mb-3 border-b border-card-border dark:border-dark-card-border pb-2">Informasi Penyewa (Opsional)</h3>
                <p class="text-sm text-muted dark:text-dark-muted mb-3">Isi bagian ini jika kamar sudah langsung ada penyewanya.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <label for="nama_penyewa" class="block font-semibold mb-1 text-sm">Nama Lengkap</label>
                        <input type="text" name="nama_penyewa" id="nama_penyewa" class="w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Nama lengkap penyewa">
                    </div>
                    <div>
                        <label for="telepon_penyewa" class="block font-semibold mb-1 text-sm">Nomor Telepon</label>
                        <input type="tel" name="telepon_penyewa" id="telepon_penyewa" class="w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="0812xxxxxxxx">
                    </div>
                    <div>
                        <label for="tanggal_masuk" class="block font-semibold mb-1 text-sm">Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" id="tanggal_masuk" class="datepicker w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Pilih tanggal...">
                    </div>
                     <div>
                        <label for="tanggal_jatuh_tempo" class="block font-semibold mb-1 text-sm">Tanggal Jatuh Tempo Berikutnya</label>
                        <input type="text" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" class="datepicker w-full py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out" placeholder="Pilih tanggal...">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <button type="button" onclick="history.back()" class="inline-flex items-center py-2 px-6 border border-muted dark:border-dark-muted rounded-full font-semibold font-sans text-muted dark:text-dark-muted hover:bg-gray-100 dark:hover:bg-dark-surface-hover transition-all">Batal</button>
                <button type="submit" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
                    Simpan Kamar
                </button>
            </div>
        </form>
    </div>
@endsection
