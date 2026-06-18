@extends('layouts.tenant.app')

@section('header_title', 'Dashboard')

@section('content')
    <!-- Ringkasan Kamar Grid -->
    @if (auth('tenant')->user()->occupancy != null)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Kamar Anda -->
        <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Kost</h3>
            <div class="flex items-center gap-3">
                <p class="text-[36px] font-bold text-primary dark:text-dark-primary">
                    {{ $kost->name }}
                </p>
            </div>
        </div>

        <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Kamar Anda</h3>
            <div class="flex items-center gap-3">
                <svg class="w-8 h-8 text-primary dark:text-dark-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <p class="text-[36px] font-bold text-primary dark:text-dark-primary">
                    {{ $kamar->name }}
                </p>
            </div>
        </div>

        <!-- Ukuran Kamar -->
        <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Ukuran Kamar</h3>
            <p class="text-[36px] font-bold text-primary dark:text-dark-primary">
                {{ $kamar->length }}
                x
                {{ $kamar->width }}
                <span class="text-base font-medium text-muted dark:text-dark-muted">Meter</span></p>
        </div>

        <!-- Sewa Bulanan -->
        <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Sewa Bulanan</h3>
            <p class="text-[36px] font-bold text-primary dark:text-dark-primary">
                <span class="text-base font-medium text-muted dark:text-dark-muted">Rp</span>
                {{ $kamar->price }}
            </p>
        </div>
    </div>

    <!-- Status Pembayaran Terakhir -->
    {{-- <div class="p-6 bg-surface dark:bg-dark-surface rounded-md shadow-clay dark:shadow-dark-clay border border-transparent transition-all duration-300">
        <div class="flex justify-between items-start">
            <div class="flex flex-col gap-2">
                <strong class="text-xl font-semibold">Pembayaran Bulan ini</strong>
                <p class="text-muted dark:text-dark-muted">Jumlah Pembayaran</p>
                <p class="text-muted dark:text-dark-muted">Jatuh Tempo</p>
            </div>

            <div class="flex flex-col items-end gap-2 text-right">
                <div class="flex items-center gap-2 text-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span class="font-semibold">Belum Lunas</span>
                </div>
                <p class="text-lg font-medium text-main dark:text-dark-main">Rp 1.500.000</p>
                <strong class="font-semibold text-main dark:text-dark-main">01-05-2024</strong>
            </div>
        </div>
    </div> --}}
    @else
    <p>Anda belum diundang, kasihan</p>
    @endif
@endsection
