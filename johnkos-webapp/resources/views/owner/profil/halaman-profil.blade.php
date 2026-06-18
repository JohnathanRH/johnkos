@php
    use App\Models\Occupancy;
    $initials = Str::of(auth()->user()->name)->initials();

    $kost = auth()->user()->kost()->with('kamars.occupancy')->first();

    $totalRoomCount = $kost ? $kost->kamars->count() : 0;
    $occupiedRooms = $kost ? $kost->kamars->pluck('occupancy')->filter()->count() : 0;
    $nearDuesCount = $kost
        ? Occupancy::whereIn('kamar_id', $kost->kamars->pluck('id'))
            ->whereBetween('deadline', [now(), now()->addDays(7)])
            ->count()
        : 0;
@endphp

@extends('app')

@section('title', 'Profil & Pengaturan - JohnKos')
@section('header_title', 'Profil & Pengaturan')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        <div class="lg:col-span-1 flex flex-col gap-6 h-full">
            <div
                class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border text-center flex flex-col flex-grow">
                <div class="flex-grow">
                    <div
                        class="w-24 h-24 rounded-full bg-primary dark:bg-dark-primary text-white flex items-center justify-center font-bold text-4xl mx-auto mb-4">
                        {{ $initials }}</div>
                    <h2 class="font-poppins font-semibold mb-1">{{ auth()->user()->name }}</h2>

                    <p class="text-muted dark:text-dark-muted mb-2">Nama Kos</p>
                    <input name="kost_name" form="profil-form" value="{{ old('kost_name', auth()->user()->kost->name ?? '') }}" type="text" id="kost_name"
                        placeholder="Masukkan nama kos"
                        class="w-full text-center py-2 px-4 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">

                </div>
                <button
                    class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 mt-4 w-full">Ubah
                    Foto</button>
            </div>

            <div
                class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold text-lg">Statistik Kos</h3>
                <div class="flex justify-between items-center text-sm py-2">
                    <span>Kamar Terisi</span>
                    <strong class="text-base">{{ $occupiedRooms }} / {{ $totalRoomCount }}</strong>
                </div>
                <div class="flex justify-between items-center text-sm py-2">
                    <span>Jatuh Tempo</span>
                    <strong class="text-base text-warning">{{ $nearDuesCount }}</strong>
                </div>
                <div class="flex justify-between items-center text-sm py-2">
                    <span>Notifikasi Baru</span>
                    <strong class="text-base text-danger">1</strong>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-danger text-white hover:bg-[#b91c1c] hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 w-full mt-auto">Logout</button>
            </form>
        </div>

        <div
            class="lg:col-span-2 bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border flex flex-col h-full">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Informasi Akun & Kos</h3>
            @if (session('success'))
                <div
                    class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-200 dark:bg-green-900/30 dark:text-green-400 dark:border-green-800">
                    {{ session('success') }}
                </div>
            @endif
            <form id="profil-form" action="{{ route('owner.profil.update') }}" method="POST" class="flex-grow">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="mb-5">
                        <label for="nama" class="block font-semibold mb-2 text-sm">Nama Lengkap</label>
                        <input name="name" value="{{ old('name', auth()->user()->name) }}" type="text" id="nama"
                            placeholder="Masukkan nama lengkap"
                            class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="telepon" class="block font-semibold mb-2 text-sm">Nomor Telepon</label>
                        <input name="phone" value="{{ old('phone', auth()->user()->phone) }}" type="text"
                            id="telepon" placeholder="Masukkan nomor telepon"
                            class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="email" class="block font-semibold mb-2 text-sm">Alamat Email</label>
                    <input name="email" type="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                        placeholder="Masukkan alamat email"
                        class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                </div>
                <div class="mb-5">
                    <label for="alamat" class="block font-semibold mb-2 text-sm">Alamat Kos</label>
                    <textarea name="address" id="alamat" rows="3" placeholder="Masukkan alamat kos secara lengkap"
                        class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out resize-none">{{ old('address', auth()->user()->kost->address ?? '') }}</textarea>
                </div>
                <button type="submit"
                    class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">Simpan
                    Perubahan</button>
            </form>

            <hr class="my-6 border-none border-t border-card-border dark:border-dark-card-border">

            <h3 class="text-[20px] mb-2 font-poppins font-semibold text-base">Pengaturan</h3>
            <div class="flex justify-between items-center mt-auto">
                <div>
                    <strong class="font-semibold">Notifikasi Email</strong>
                    <p class="text-muted dark:text-dark-muted text-xs">Kirim notifikasi ke email Anda.</p>
                </div>
                <div class="relative inline-block w-[50px] h-[28px]">
                    <input type="checkbox" id="emailNotifToggle" class="opacity-0 w-0 h-0 peer" checked>
                    <label for="emailNotifToggle"
                        class="absolute cursor-pointer top-0 left-0 right-0 bottom-0 bg-surface dark:bg-dark-surface border border-card-border dark:border-dark-card-border rounded-[34px] transition-colors duration-300 shadow-input dark:shadow-dark-input peer-checked:bg-primary dark:peer-checked:bg-dark-primary peer-checked:border-primary dark:peer-checked:border-dark-primary"></label>
                    <span
                        class="absolute content-[''] h-[20px] w-[20px] left-[3px] bottom-[3px] bg-muted dark:bg-dark-muted rounded-full transition-transform duration-300 ease-in-out pointer-events-none peer-checked:translate-x-[22px] peer-checked:bg-white"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
