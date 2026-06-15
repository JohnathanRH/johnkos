@extends('layouts.tenant.app')

@section('header_title', 'Profil & Pengaturan')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        <div class="lg:col-span-1 flex flex-col gap-6 h-full">
            <!-- User Info Card -->
            <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border text-center flex flex-col flex-grow">
                <div class="flex-grow">
                    <div class="w-24 h-24 rounded-full bg-primary dark:bg-dark-primary text-white flex items-center justify-center font-bold text-4xl mx-auto mb-4">JD</div>
                    <h2 class="font-poppins font-semibold mb-1">Jane Doe</h2>
                    <p class="text-muted dark:text-dark-muted">Penyewa</p>
                </div>
                <button class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 mt-4 w-full">Ubah Foto</button>
            </div>

            <!-- Room Info Card -->
            <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border">
                <h3 class="text-[20px] mb-2 font-poppins font-semibold text-lg">Kamar A1</h3>
                <div class="flex justify-between items-center text-sm py-2">
                    <span>Ukuran Kamar</span>
                    <strong class="text-base">4x5 Meter</strong>
                </div>
                <div class="flex justify-between items-center text-sm py-2">
                    <span>Biaya Sewa</span>
                    <strong class="text-base">Rp 1.500.000</strong>
                </div>
            </div>

            <a href="{{ route('logout') }}" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-danger text-white hover:bg-[#b91c1c] hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0 w-full mt-auto">Logout</a>
        </div>

        <!-- Account Settings Form -->
        <div class="lg:col-span-2 bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border flex flex-col h-full">
            <h3 class="text-[20px] mb-2 font-poppins font-semibold">Informasi Akun</h3>
            <form class="flex-grow">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="mb-5">
                        <label for="nama" class="block font-semibold mb-2 text-sm">Nama Lengkap</label>
                        <input type="text" id="nama" value="Jane Doe" placeholder="Masukkan nama lengkap" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="telepon" class="block font-semibold mb-2 text-sm">Nomor Telepon</label>
                        <input type="text" id="telepon" value="089876543210" placeholder="Masukkan nomor telepon" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="email" class="block font-semibold mb-2 text-sm">Alamat Email</label>
                    <input type="email" id="email" value="janedoe@example.com" placeholder="Masukkan alamat email" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                </div>
                <button type="submit" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">Simpan Perubahan</button>
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
                    <label for="emailNotifToggle" class="absolute cursor-pointer top-0 left-0 right-0 bottom-0 bg-surface dark:bg-dark-surface border border-card-border dark:border-dark-card-border rounded-[34px] transition-colors duration-300 shadow-input dark:shadow-dark-input peer-checked:bg-primary dark:peer-checked:bg-dark-primary peer-checked:border-primary dark:peer-checked:border-dark-primary"></label>
                    <span class="absolute content-[''] h-[20px] w-[20px] left-[3px] bottom-[3px] bg-muted dark:bg-dark-muted rounded-full transition-transform duration-300 ease-in-out pointer-events-none peer-checked:translate-x-[22px] peer-checked:bg-white"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
