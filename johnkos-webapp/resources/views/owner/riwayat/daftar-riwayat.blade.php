@extends('app')

@section('title', 'Riwayat - JohnKos')
@section('header_title', 'Riwayat')

@section('content')
    <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
        <div id="filterNotifikasiContainer" class="flex gap-3 mb-6 flex-wrap">
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] filter-active">Semua</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Belum Dibaca</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Pembayaran</button>
        </div>

        <div class="flex flex-col gap-3">
            <div class="flex items-center gap-4 p-4 rounded-md bg-surface dark:bg-dark-surface shadow-input dark:shadow-dark-input border-l-4 border-primary dark:border-dark-primary transition-all duration-300">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl font-bold text-white flex-shrink-0 bg-warning">!</div>
                <div class="flex-1">
                    <p><strong>Tagihan Jatuh Tempo</strong> untuk <strong>Siti Aminah (Kamar 02)</strong>.</p>
                    <p class="text-muted dark:text-dark-muted text-xs">2 hari yang lalu</p>
                </div>
                <a href="#" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 py-2 px-4 text-xs">Lihat Tagihan</a>
            </div>

            <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border border-transparent transition-all duration-300">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl font-bold text-white flex-shrink-0 bg-success">$</div>
                <div class="flex-1">
                    <p><strong>Pembayaran Lunas</strong> diterima dari <strong>Ahmad Budi (Kamar 01)</strong>.</p>
                    <p class="text-muted dark:text-dark-muted text-xs">5 hari yang lalu</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border border-transparent transition-all duration-300">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-xl font-bold text-white flex-shrink-0 bg-primary dark:bg-dark-primary">i</div>
                <div class="flex-1">
                    <p><strong>Penyewa baru</strong> telah ditambahkan ke <strong>Kamar 07</strong>.</p>
                    <p class="text-muted dark:text-dark-muted text-xs">1 minggu yang lalu</p>
                </div>
                 <a href="/owner/penyewa/2" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-surface dark:bg-dark-surface text-main dark:text-dark-main hover:bg-background dark:hover:bg-dark-background hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 py-2 px-4 text-xs">Lihat Penyewa</a>
            </div>
        </div>
    </div>
@endsection
