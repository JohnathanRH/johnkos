<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - JohnKos</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|montserrat:400,500,600,700" rel="stylesheet" />
    <script>
        (function() {
            const theme = localStorage.getItem('color-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center bg-background dark:bg-dark-background text-main dark:text-dark-main font-sans antialiased relative">

    <div class="absolute top-6 right-6">
        <button id="theme-toggle" type="button" class="w-10 h-10 flex items-center justify-center rounded-full bg-surface dark:bg-dark-surface shadow-clay dark:shadow-dark-clay cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover active:shadow-clay-active dark:active:shadow-dark-clay-active text-main dark:text-dark-main">
            <svg class="w-5 h-5 hidden dark:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            <svg class="w-5 h-5 block dark:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
        </button>
    </div>

    <div class="bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border w-full max-w-md text-center">
        <h1 class="text-primary dark:text-dark-primary mb-2 text-3xl font-poppins font-semibold">JohnKos</h1>
        <p class="text-muted dark:text-dark-muted mb-8">Selamat datang kembali!</p>
{{-- 
        <div class="grid grid-cols-2 bg-background dark:bg-dark-background rounded-md p-1 mb-8 shadow-input dark:shadow-dark-input">
            <button type="button" id="ownerBtn" data-action="{{ route('owner.dashboard') }}" class="p-3 rounded-md border border-transparent bg-surface dark:bg-dark-surface text-main dark:text-dark-main font-semibold cursor-pointer transition-all duration-200 ease-in-out shadow-clay dark:shadow-dark-clay">Pemilik</button>
            <button type="button" id="tenantBtn" data-action="{{ route('tenant.dashboard') }}" class="p-3 rounded-md border border-transparent bg-transparent text-muted dark:text-dark-muted font-semibold cursor-pointer transition-all duration-200 ease-in-out hover:text-primary dark:hover:text-dark-primary hover:bg-primary/10">Penyewa</button>
        </div> --}}

        <form id="loginForm" action="{{ route('tenant.login.store') }}" method="POST" class="text-left">
            @csrf
            <input type="hidden" id="selectedRole" name="role" value="owner">
            <div class="mb-5">
                <label for="email" class="block font-semibold mb-2 text-sm">Email</label>
                <div class="relative w-full">
                    <input type="email" id="email" name="email" value="tenant@tenant.com" placeholder="Masukkan alamat email" required class="w-full py-3.5 px-5 rounded-md border-none bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-shadow duration-200 ease-in-out focus:shadow-input dark:focus:shadow-dark-input">
                </div>
            </div>
            <div class="mb-5">
                <label for="phone" class="block font-semibold mb-2 text-sm">Phone</label>
                <div class="relative w-full">
                    <input type="text" id="phone" name="phone" value="081234567890" placeholder="Masukkan alamat email" required class="w-full py-3.5 px-5 rounded-md border-none bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-shadow duration-200 ease-in-out focus:shadow-input dark:focus:shadow-dark-input">
                </div>
            </div>
            <div class="mb-5">
                <label for="password" class="block font-semibold mb-2 text-sm">Password</label>
                <div class="relative w-full">
                    <input type="password" id="password" name="password" value="password" placeholder="Masukkan password" required class="w-full py-3.5 px-5 rounded-md border-none bg-background dark:bg-dark-background shadow-input dark:shadow-dark-input outline-none font-sans text-main dark:text-dark-main transition-shadow duration-200 ease-in-out pr-[70px]">
                    <button type="button" id="passwordToggle" class="absolute right-4 top-1/2 -translate-y-1/2 bg-none border-none text-muted dark:text-dark-muted cursor-pointer font-bold text-xs p-1 transition-colors duration-200 hover:text-primary dark:hover:text-dark-primary">SHOW</button>
                </div>
            </div>
            <button type="submit" class="w-full mt-4 p-4 p-3 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] shadow-clay dark:shadow-dark-clay inline-block text-center bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">Masuk</button>
        </form>
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</body>
</html>
