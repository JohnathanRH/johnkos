@extends('app')

@section('title', 'Detail Kamar ' . $kamar->nomor_kamar . ' - JohnKos')
@section('header_title', 'Detail Kamar ' . $kamar->nomor_kamar)

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <div class="lg:col-span-2 bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border flex flex-col h-full">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Informasi Kamar</h3>
            <div class="flex justify-between items-baseline py-3">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold">{{ $kamar->name }}</h3>
            </div>
            <div class="flex-grow">
                <div class="flex justify-between items-baseline py-3 border-b border-card-border dark:border-dark-card-border">
                    <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Status</span>
                    @if ($kamar->occupancy != null)
                    @php
                        $deadline = \Carbon\Carbon::parse($kamar->occupancy->deadline);
                        $daysRemaining = now()->diffInDays($deadline, false);
                    @endphp
                        @if($daysRemaining <= 7)
                            <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-warning text-[#78350f]">
                                Jatuh Tempo
                            </span>
                        @else
                            <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-success text-[#14532d]">
                                Terisi
                            </span>
                        @endif
                    @else
                        <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-background dark:bg-dark-background text-muted dark:text-dark-muted border border-card-border dark:border-dark-card-border">
                            Kosong
                        </span>
                    @endif
                </div>
                <div class="flex justify-between items-baseline py-3 border-b border-card-border dark:border-dark-card-border">
                    <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Harga per Bulan</span>
                    <strong class="font-semibold">Rp {{ number_format($kamar->price, 0, ',', '.') }}</strong>
                </div>
                <div class="flex justify-between items-baseline py-3">
                    <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Fasilitas</span>
                    <p class="text-right">{{ implode(', ', $kamar->facilities) }}</p>
                </div>
                
            </div>
            <div class="mt-auto pt-4">
                <a href="{{ route('owner.kamar.edit', ['kamar' => $kamar->id]) }}" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">Edit Informasi Kamar</a>
            </div>
        </div>

        @if ($kamar->occupancy != null)
            <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border flex flex-col h-full">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold">Informasi Penghuni</h3>
                <div class="flex-grow">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-[50px] h-[50px] rounded-full bg-primary dark:bg-dark-primary text-white flex items-center justify-center font-bold text-xl">
                            {{ Str::of($kamar->occupancy->tenant->name)->initials() }}
                        </div>
                        <div>
                            <h4 class="font-poppins font-semibold m-0">{{ $kamar->occupancy->tenant->name }}</h4>
                            <a href="{{ route('owner.penyewa.show', ['id' => $kamar->occupancy->tenant->id]) }}" class="text-muted dark:text-dark-muted text-sm underline">Lihat Profil Penyewa</a>
                        </div>
                    </div>
                    <div class="flex justify-between items-baseline py-3 border-b border-card-border dark:border-dark-card-border">
                        <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Tanggal Masuk</span>
                        <strong class="font-semibold">{{ \Carbon\Carbon::parse($kamar->occupancy->created_at)->format('d F Y') }}</strong>
                    </div>
                    <div class="flex justify-between items-baseline py-3">
                        <span class="text-muted dark:text-dark-muted w-[180px] flex-shrink-0">Jatuh Tempo Berikutnya</span>
                        <strong class="font-semibold">{{ \Carbon\Carbon::parse($kamar->occupancy->deadline)->format('d F Y') }}</strong>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border flex flex-col h-full items-center justify-center text-center">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold">Kamar Ini Kosong</h3>
                <p class="text-muted dark:text-dark-muted mb-4">Tidak ada informasi penghuni untuk ditampilkan.</p>
                <a href="{{ route('owner.kamar.tambah-penyewa', ['id' => $kamar->id]) }}" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
                    + Tambah Penyewa
                </a>
            </div>
        @endif

        {{-- @if ($kamar->occupancy != null)
            <div class="lg:col-span-3 bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold">Riwayat Pembayaran</h3>
                <div class="space-y-2">

                    <div class="flex justify-between items-center p-3 bg-background dark:bg-dark-background rounded-sm">
                        <p>Pembayaran Bulan November</p>
                        <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-success text-[#14532d]">Lunas</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-background dark:bg-dark-background rounded-sm">
                        <p>Pembayaran Bulan Oktober</p>
                        <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-success text-[#14532d]">Lunas</span>
                    </div>
                </div>
            </div>
        @endif --}}
    </div>
@endsection
