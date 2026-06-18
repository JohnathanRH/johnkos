@extends('app')

@section('title', 'Detail Penyewa - JohnKos')
@section('header_title', 'Detail Penyewa')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <div class="lg:col-span-1 bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border text-center flex flex-col h-full">
            <div class="flex-grow">
                <div class="w-32 h-32 rounded-full bg-primary dark:bg-dark-primary text-white flex items-center justify-center font-bold text-5xl mx-auto mb-4">ABC</div>
                <h2 class="font-poppins font-semibold mb-1">{{ $tenant->name }}</h2>
                <p class="text-muted dark:text-dark-muted">
                    Menyewa
                    <a href="{{ route('owner.kamar.show', ['kamar' => $tenant->occupancy->kamar->id]) }}" class="underline hover:text-primary">
                        {{ $tenant->occupancy->kamar->name }}
                    </a>
                </p>
            </div>
            <div class="flex flex-col gap-3 mt-4">
                 {{-- <a href="{{ route('owner.penyewa.edit', ['id' => $tenant->id]) }}" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 w-full">Edit Profil Penyewa</a> --}}
                 
                 <a href="{{ route('owner.kamar.show', ['kamar' => $tenant->occupancy->kamar->id]) }}" class="p-3 px-6 border border-muted dark:border-dark-muted rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] inline-block text-center text-muted dark:text-dark-muted hover:bg-gray-100 dark:hover:bg-dark-surface-hover w-full">
                    Lihat Detail Kamar
                </a>
            </div>
        </div>

        <div class="lg:col-span-2 flex flex-col gap-6">
            <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold">Informasi Pribadi</h3>
                <div>
                    <div class="flex justify-between items-baseline py-3 border-b border-card-border dark:border-dark-card-border">
                        <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Nomor Telepon</span>
                        <strong class="font-semibold text-right">{{ $tenant->phone }}</strong>
                    </div>
                </div>
            </div>
            <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold">Informasi Sewa</h3>
                <div>
                    <div class="flex justify-between items-baseline py-3 border-b border-card-border dark:border-dark-card-border">
                        <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Tanggal Masuk</span>
                        <strong class="font-semibold text-right">{{ \Carbon\Carbon::parse($tenant->occupancy->created_at)->format('d F Y') }}</strong>
                    </div>
                    <div class="flex justify-between items-baseline py-3">
                        <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Jatuh Tempo Berikutnya</span>
                        <strong class="font-semibold text-right">{{ \Carbon\Carbon::parse($tenant->occupancy->deadline)->format('d F Y') }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
