@extends('app')

@section('title', 'Kamar - JohnKos')
@section('header_title', 'Daftar Kamar')

@section('content')
    <div class="flex justify-between items-center mb-4">
        {{-- <div id="filterKamarContainer" class="flex gap-3 flex-wrap">
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] filter-active">Semua</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Terisi</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Kosong</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Jatuh Tempo</button>
        </div> --}}

        <a href="{{ route('owner.kamar.create') }}" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">+ Tambah Kamar</a>
    </div>

    <div class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-6">
        @foreach ($kamars as $kamar)
        @if ($kamar->occupancy != null)
        @php
            $deadline = \Carbon\Carbon::parse($kamar->occupancy->deadline);
            $daysRemaining = now()->diffInDays($deadline, false);
        @endphp
        <a href="{{ route('owner.kamar.show', ['kamar' => $kamar->id]) }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-[20px] m-0 font-poppins font-semibold">{{$kamar->name}}</h3>
                @if ($daysRemaining <= 7)
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-warning text-[#78350f]">
                    Jatuh Tempo
                </span>
                @else
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-success text-[#14532d]">
                    Terisi
                </span>
                @endif
            </div>
            <div class="mb-3">
                <p class="text-muted dark:text-dark-muted text-sm">Penghuni:</p>
                <p class="font-semibold">{{ $kamar->occupancy->tenant->name }}</p>
            </div>
            <div class="flex justify-between items-center text-sm border-t border-card-border dark:border-dark-card-border pt-3">
                <span class="text-muted dark:text-dark-muted">Jatuh Tempo:</span>
                <span class="font-medium">
                    {{ $deadline->format('d F Y') }}
                </span>
            </div>
        </a>
        @else
        <a href="{{ route('owner.kamar.show', ['kamar' => $kamar->id]) }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-[20px] m-0 font-poppins font-semibold">{{ $kamar->name }}</h3>
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-background dark:bg-dark-background text-muted dark:text-dark-muted border border-card-border dark:border-dark-card-border">
                    Kosong
                </span>
            </div>
            <div class="mb-3">
                <p class="text-muted dark:text-dark-muted text-sm">Fasilitas:</p>
                <p class="font-medium text-sm">{{ implode(', ', $kamar->facilities) }}</p>
            </div>
             <div class="flex justify-between items-center text-sm border-t border-card-border dark:border-dark-card-border pt-3">
                <span class="text-muted dark:text-dark-muted">Harga/Bulan:</span>
                <span class="font-semibold">Rp {{$kamar->price}}</span>
            </div>
        </a>
        @endif
        @endforeach
{{-- 
        <a href="{{ route('owner.kamar.show', ['id' => 2]) }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-[20px] m-0 font-poppins font-semibold">Kamar 02</h3>
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-warning text-[#78350f]">Jatuh Tempo</span>
            </div>
            <div class="mb-3">
                <p class="text-muted dark:text-dark-muted text-sm">Penghuni:</p>
                <p class="font-semibold">Siti Aminah</p>
            </div>
            <div class="flex justify-between items-center text-sm border-t border-card-border dark:border-dark-card-border pt-3">
                <span class="text-muted dark:text-dark-muted">Jatuh Tempo:</span>
                <span class="font-medium text-danger">01 Nov 2023</span>
            </div>
        </a> --}}
    </div>
@endsection
