@extends('layouts.tenant.app')

@section('header_title', 'Riwayat Pembayaran')

@section('content')
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-md shadow-clay dark:shadow-dark-clay border border-transparent transition-all duration-300">
        <h3 class="text-xl font-poppins font-semibold mb-4">Semua Riwayat Pembayaran</h3>
        <div class="flex flex-col gap-3">

            <!-- Juni 2024 (Belum Lunas) -->
            <div class="flex items-center justify-between gap-4 p-3 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border-l-4 border-warning transition-all duration-300">
                <div class="flex-1">
                    <p><strong class="font-semibold">01 Juni 2024</strong></p>
                    <p class="text-sm text-muted dark:text-dark-muted">Rp 1.500.000</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-warning">Belum Lunas</span>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-warning shadow-clay dark:shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    </div>
                </div>
            </div>

            <!-- Mei 2024 (Lunas) -->
            <div class="flex items-center justify-between gap-4 p-3 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border border-transparent transition-all duration-300">
                <div class="flex-1">
                    <p><strong class="font-semibold">01 Mei 2024</strong></p>
                    <p class="text-sm text-muted dark:text-dark-muted">Rp 1.500.000</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-success">Lunas</span>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-success shadow-clay dark:shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                </div>
            </div>

            <!-- April 2024 (Lunas) -->
            <div class="flex items-center justify-between gap-4 p-3 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border border-transparent transition-all duration-300">
                <div class="flex-1">
                    <p><strong class="font-semibold">01 April 2024</strong></p>
                    <p class="text-sm text-muted dark:text-dark-muted">Rp 1.500.000</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-success">Lunas</span>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-success shadow-clay dark:shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                </div>
            </div>

            <!-- Maret 2024 (Lunas) -->
            <div class="flex items-center justify-between gap-4 p-3 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border border-transparent transition-all duration-300">
                <div class="flex-1">
                    <p><strong class="font-semibold">01 Maret 2024</strong></p>
                    <p class="text-sm text-muted dark:text-dark-muted">Rp 1.500.000</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-success">Lunas</span>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-success shadow-clay dark:shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                </div>
            </div>

            <!-- Februari 2024 (Lunas) -->
            <div class="flex items-center justify-between gap-4 p-3 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border border-transparent transition-all duration-300">
                <div class="flex-1">
                    <p><strong class="font-semibold">01 Februari 2024</strong></p>
                    <p class="text-sm text-muted dark:text-dark-muted">Rp 1.500.000</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-success">Lunas</span>
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-success shadow-clay dark:shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
