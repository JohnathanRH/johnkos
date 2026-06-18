@extends('app')

@section('title', 'Edit Kamar - JohnKos')
@section('header_title', 'Edit Informasi Kamar')

@section('content')
    <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay border border-card-border dark:border-dark-card-border">
        <form action="{{ route('owner.kamar.update', ['kamar' => $kamar->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-8">
                <h3 class="text-xl font-poppins font-semibold mb-4 border-b border-card-border dark:border-dark-card-border pb-2">Informasi Kamar</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2">
                    <div class="mb-5">
                        <label for="name" class="block font-semibold mb-2 text-sm">Nama Kamar</label>
                        <input value="{{ $kamar->name }}" type="text" name="name" id="name" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="floor" class="block font-semibold mb-2 text-sm">Lantai</label>
                        <input value="{{ $kamar->floor }}" type="number" name="floor" id="floor" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="price" class="block font-semibold mb-2 text-sm">Harga per Bulan (Rp)</label>
                        <input value="{{ $kamar->price }}" type="number" name="price" id="price" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="facilities" class="block font-semibold mb-2 text-sm">Fasilitas</label>
                        <input value="{{ implode(', ', $kamar->facilities) }}" type="text" name="facilities" id="facilities" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="length" class="block font-semibold mb-2 text-sm">Panjang</label>
                        <input value="{{ $kamar->length }}" type="number" name="length" id="length" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                    <div class="mb-5">
                        <label for="width" class="block font-semibold mb-2 text-sm">Lebar</label>
                        <input value="{{ $kamar->width }}" type="number" name="width" id="width" class="w-full py-3 px-5 rounded-md border border-transparent bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="history.back()" class="inline-flex items-center py-2 px-6 border border-muted dark:border-dark-muted rounded-full font-semibold font-sans text-muted dark:text-dark-muted hover:bg-gray-100 dark:hover:bg-dark-surface-hover transition-all">Batal</button>
                <button type="submit" class="p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
