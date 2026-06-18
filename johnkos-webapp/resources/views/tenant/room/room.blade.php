@extends('layouts.tenant.app')

@section('header_title', $kamar->name)

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

        <!-- Kolom Kiri -->
        <div class="flex flex-col gap-6">
            <!-- 1. Detail Kamar -->
            <div class="p-6 bg-surface dark:bg-dark-surface rounded-md shadow-clay dark:shadow-dark-clay border border-transparent transition-all duration-300">
                <h3 class="text-xl font-poppins font-semibold mb-5 text-gray-800 dark:text-gray-100">
                    Informasi Kamar
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Ukuran -->
                    <div class="p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input flex items-center justify-between">
                        <div>
                            <p class="text-sm text-muted dark:text-dark-muted mb-1">Ukuran Kamar</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                                {{ $kamar->length }}
                                x
                                {{ $kamar->width }} Meter
                            </p>
                        </div>
                        <div class="text-gray-400 dark:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m15 9-3-3-3 3"/><path d="M12 6v12"/><path d="m19 15 3 3-3 3"/><path d="M12 18h10"/></svg>
                        </div>
                    </div>

                    <!-- Sewa -->
                    <div class="p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input flex items-center justify-between">
                        <div>
                            <p class="text-sm text-muted dark:text-dark-muted mb-1">Sewa Bulanan</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $kamar->price }}<span class="text-sm font-normal text-muted dark:text-dark-muted">/ bln</span></p>
                        </div>
                        <div class="text-gray-400 dark:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Tarif Utilitas -->
            <div class="p-6 bg-surface dark:bg-dark-surface rounded-md shadow-clay dark:shadow-dark-clay border border-transparent transition-all duration-300">
                <h3 class="text-xl font-poppins font-semibold mb-5 text-gray-800 dark:text-gray-100">Tarif Utilitas Tambahan</h3>
                <div class="flex flex-col gap-4">
                    <!-- Listrik -->
                    <div class="flex items-center justify-between gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border-l-4 border-warning transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-warning shadow-clay dark:shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                            </div>
                            <span class="text-base font-medium text-gray-700 dark:text-gray-200">Listrik</span>
                        </div>
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-100">Rp 3.000 <span class="text-sm font-normal text-muted dark:text-dark-muted">/ kWh</span></span>
                    </div>

                    <!-- Air -->
                    <div class="flex items-center justify-between gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border-l-4 border-blue-500 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-blue-500 shadow-clay dark:shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path></svg>
                            </div>
                            <span class="text-base font-medium text-gray-700 dark:text-gray-200">Air</span>
                        </div>
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-100">Rp 15.000 <span class="text-sm font-normal text-muted dark:text-dark-muted">/ m³</span></span>
                    </div>

                    <!-- WiFi (Include) -->
                    <div class="flex items-center justify-between gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input border-l-4 border-success transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white flex-shrink-0 bg-success shadow-clay dark:shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                            </div>
                            <span class="text-base font-medium text-gray-700 dark:text-gray-200">Internet (WiFi)</span>
                        </div>
                        <span class="text-base font-semibold text-success">Termasuk</span>
                    </div>
                </div>
                <a href="{{ route('tenant.checkout', ['occupancy' => $kamar->occupancy->id]) }}" class="mt-5 p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
                    BAYAR!
                </a>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="h-full">
            <!-- 2. Fasilitas Kamar -->
            <div class="p-6 bg-surface dark:bg-dark-surface rounded-md shadow-clay dark:shadow-dark-clay border border-transparent transition-all duration-300 h-full">
                <h3 class="text-xl font-poppins font-semibold mb-5 text-gray-800 dark:text-gray-100">Fasilitas Kamar</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach ($kamar->facilities as $facility)
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-indigo-100 dark:bg-indigo-900/30 text-indigo-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">{{ $facility }}</span>
                    </div>
                        
                    @endforeach
                    {{-- <!-- WiFi -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-blue-100 dark:bg-blue-900/30 text-blue-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">WiFi</span>
                    </div>
                    <!-- AC -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-teal-100 dark:bg-teal-900/30 text-teal-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"></path></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">AC</span>
                    </div>
                    <!-- Water Heater -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-orange-100 dark:bg-orange-900/30 text-orange-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"></path></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">Water Heater</span>
                    </div>
                    <!-- Tempat Tidur -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-indigo-100 dark:bg-indigo-900/30 text-indigo-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">Tempat Tidur</span>
                    </div>
                    <!-- Meja Kerja -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-purple-100 dark:bg-purple-900/30 text-purple-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">Meja Kerja</span>
                    </div>

                    <!-- Kamar Mandi Dalam -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-pink-100 dark:bg-pink-900/30 text-pink-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6 6.5 3.5a1.5 1.5 0 0 0-1-.5C4.683 3 4 3.683 4 4.5V17a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"/><line x1="10" x2="8" y1="5" y2="7"/><line x1="2" x2="22" y1="12" y2="12"/><line x1="7" x2="7" y1="19" y2="21"/><line x1="17" x2="17" y1="19" y2="21"/></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">K. Mandi Dalam</span>
                    </div>

                    <!-- Lemari -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-emerald-100 dark:bg-emerald-900/30 text-emerald-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="20" x="3" y="2" rx="2"/><path d="M12 2v20"/><path d="M8 12h.01"/><path d="M16 12h.01"/></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">Lemari</span>
                    </div>

                    <!-- Dapur Dalam -->
                    <div class="flex items-center gap-4 p-4 rounded-md bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input transition-all duration-300">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center bg-rose-100 dark:bg-rose-900/30 text-rose-500 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>
                        </div>
                        <span class="text-base font-medium text-gray-700 dark:text-gray-200">Dapur Dalam</span>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
