@extends('app')

@section('title', 'Notifikasi - JohnKos')
@section('header_title', 'Notifikasi')

@section('content')
    <div
        class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
        {{-- <div id="filterNotifikasiContainer" class="flex gap-3 mb-6 flex-wrap">
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] filter-active">Semua</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Belum Dibaca</button>
            <button class="filter-button py-2 px-4 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)]">Pembayaran</button>
        </div> --}}

        <div class="flex justify-end mb-4">
            <div class="flex items-center gap-2">
                <label for="per_page" class="text-sm font-semibold text-muted dark:text-dark-muted">Tampilkan:</label>
                <form method="GET" action="{{ route('owner.riwayat.index') }}">
                    <select name="per_page" id="per_page" onchange="this.form.submit()" class="py-2 px-3 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out cursor-pointer text-sm">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            @forelse($notifications as $notification)
                <div
                    class="flex items-center gap-4 p-4 rounded-md bg-surface dark:bg-dark-surface shadow-input dark:shadow-dark-input border-l-4 {{ $notification->tags == 'Tidak Bayar' ? 'border-warning' : ($notification->tags == 'Detail' ? 'border-primary dark:border-dark-primary' : 'border-success') }} transition-all duration-300">
                    <div
                        class="w-10 h-10 rounded-full flex items-center justify-center text-xl font-bold text-white flex-shrink-0 {{ $notification->tags == 'Tidak Bayar' ? 'bg-warning' : ($notification->tags == 'Detail' ? 'bg-primary dark:bg-dark-primary' : 'bg-success') }}">
                        @if ($notification->tags == 'Tidak Bayar')
                            !
                        @elseif($notification->tags == 'Detail')
                            i
                        @else
                            $
                        @endif
                    </div>
                    <div class="flex-1">
                        <p><strong>{{ $notification->title }}</strong> - {!! $notification->description !!}</p>
                        <p class="text-muted dark:text-dark-muted text-xs">{{ $notification->created_at->diffForHumans() }}
                        </p>
                    </div>
                    @if ($notification->tags == 'Detail')
                        <a href="{{ route('owner.penyewa.show', ['tenant' => 2]) }}"
                            class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-surface dark:bg-dark-surface text-main dark:text-dark-main hover:bg-background dark:hover:bg-dark-background hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 py-2 px-4 text-xs">Lihat
                            Detail</a>
                    @elseif($notification->tags == 'Tidak Bayar')
                        <a href="#"
                            class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 py-2 px-4 text-xs">Lihat
                            Tagihan</a>
                    @endif
                </div>
            @empty
                <div class="p-6 text-center text-muted dark:text-dark-muted">
                    Tidak ada notifikasi saat ini.
                </div>
            @endforelse
        </div>

        <div class="mt-6 flex justify-center gap-4">
            @if (!$notifications->onFirstPage())
                <a href="{{ $notifications->previousPageUrl() }}" class="inline-block p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay bg-surface dark:bg-dark-surface text-main dark:text-dark-main hover:bg-background dark:hover:bg-dark-background hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 text-sm">
                    Sebelumnya
                </a>
            @endif

            @if ($notifications->hasMorePages())
                <a href="{{ $notifications->nextPageUrl() }}" class="inline-block p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 text-sm">
                    Lihat Lebih Banyak
                </a>
            @endif
        </div>
    </div>
@endsection
