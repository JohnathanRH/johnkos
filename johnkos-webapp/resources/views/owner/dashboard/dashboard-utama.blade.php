@extends('app')

@section('title', 'Dashboard Pemilik - JohnKos')
@section('header_title', "Dashboard")

@php
    $totalRoomCount = $kost->kamars->count();
    $occupiedRooms = $occupancies->count();
    $nearDuesCount = $nearDues->count();
    
    $percentage = $totalRoomCount > 0 ? ($occupiedRooms / $totalRoomCount) * 100 : 0;
@endphp

@section('content')
    <div class="grid grid-cols-[repeat(auto-fill,minmax(250px,1fr))] gap-6">
        <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Kamar Terisi</h3>
            <p class="text-[36px] font-bold text-primary dark:text-dark-primary">
                {{ $occupiedRooms }}
                <span class="text-base font-medium text-muted dark:text-dark-muted">
                    / {{ $totalRoomCount }}
                </span>
            </p>
            <div class="mt-4">
                <div class="h-[10px] bg-[#d1d9e6] rounded-[5px] overflow-hidden">
                    <div style="width: {{ $percentage }}%;" class="h-full bg-primary dark:bg-dark-primary rounded-[5px]"></div>
                </div>
            </div>
        </div>

        <a href="{{ route('owner.penyewa.index') }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">
                Total Penyewa
            </h3>
            <p class="text-[36px] font-bold text-primary dark:text-dark-primary">
                {{ $occupiedRooms }}
                <span class="text-base font-medium text-muted dark:text-dark-muted">
                    Penyewa
                </span>
            </p>
        </a>

        <a href="{{ route('owner.kamar.index') }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Jatuh Tempo</h3>
            <p class="text-[36px] font-bold text-warning">
                {{ $nearDuesCount }}
                <span class="text-base font-medium text-muted dark:text-dark-muted">
                    Penyewa
                </span>
            </p>
        </a>

        <a href="{{ route('owner.riwayat.index') }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">
                Notifikasi Baru
            </h3>
            <p class="text-[36px] font-bold text-danger">
                {{ $notifications->count() }}
            </p>
        </a>
    </div>

    <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border mt-4">
        <h3 class="text-[20px] mb-4 font-poppins font-semibold">Aktivitas Terbaru</h3>

        @foreach ($notifications as $notification)
        <div class="flex justify-between items-center py-3 border-b border-card-border dark:border-dark-card-border">
            <div>
                <p><strong>
                    {{ $notification->title }}
                </strong></p>
                <p>
                    {{ $notification->description}}
                </p>
                <p class="text-muted dark:text-dark-muted text-xs">
                    {{ $notification->created_at->diffForHumans() }}
                </p>
            </div>
            @if ($notification->tags == "Lunas")
            <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-success text-[#14532d]">
                {{ $notification->tags }}
            </span>
            @elseif($notification->tags == "Tidak Bayar")
            <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-red-500 text-[#14532d]">
                {{ $notification->tags }}
            </span>
            @elseif($notification->tags == "Detail")
            <a href="{{ route('owner.penyewa.show', ['id' => 2]) }}" class="inline-block text-center p-3 px-6 border border-transparent rounded-full font-semibold cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay bg-surface dark:bg-dark-surface text-main dark:text-dark-main hover:bg-background dark:hover:bg-dark-background hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 py-2 px-4 text-xs">
                Lihat Detail
            </a>
            @endif
        </div>
        @endforeach
    </div>
@endsection
