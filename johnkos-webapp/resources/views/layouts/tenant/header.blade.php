<header class="flex justify-between items-center p-4 px-6 bg-surface dark:bg-dark-surface rounded-md shadow-clay dark:shadow-dark-clay border border-transparent transition-all duration-300">
    <div class="flex items-center gap-4">
        @if(request()->routeIs('tenant.kamar.show'))
            <a href="javascript:history.back()" class="w-10 h-10 flex items-center justify-center rounded-full transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:bg-surface dark:hover:bg-dark-surface">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
        @endif
        <h2 class="text-[24px] font-poppins font-semibold">@yield('header_title', 'Dashboard')</h2>
    </div>

    <div class="flex items-center gap-4">
        <button id="theme-toggle" type="button" class="w-10 h-10 flex items-center justify-center rounded-full bg-surface dark:bg-dark-surface shadow-clay dark:shadow-dark-clay cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover active:shadow-clay-active dark:active:shadow-dark-clay-active text-main dark:text-dark-main">
            <svg class="w-5 h-5 hidden dark:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            <svg class="w-5 h-5 block dark:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
        </button>

        <a href="{{ route('tenant.profil') }}" class="flex items-center gap-3 p-2 px-4 rounded-full bg-surface dark:bg-dark-surface shadow-clay dark:shadow-dark-clay cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
            <div class="w-10 h-10 rounded-full bg-primary dark:bg-dark-primary text-white flex items-center justify-center font-bold text-lg">
                <span>JD</span>
            </div>
            <div class="user-info">
                <strong class="font-semibold">Jane Doe</strong>
                <div class="text-muted dark:text-dark-muted text-xs">Penyewa</div>
            </div>
        </a>
    </div>
</header>
