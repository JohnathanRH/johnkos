<aside class="w-[280px] h-screen sticky top-0 overflow-y-auto bg-surface dark:bg-dark-surface p-8 flex flex-col gap-8 border-r-2 border-card-border dark:border-dark-card-border shadow-clay dark:shadow-dark-clay z-10 transition-all duration-300">
    <div class="text-center">
        <h1 class="text-primary dark:text-dark-primary text-[28px] font-poppins font-semibold">JohnKos</h1>
    </div>

    <nav class="flex flex-col gap-3">
        <a href="{{ route('owner.dashboard') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('owner.dashboard') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Dashboard</span>
        </a>
        <a href="{{ route('owner.kamar.index') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('owner.kamar.*') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Kamar</span>
        </a>
        <a href="{{ route('owner.penyewa.index') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('owner.penyewa.*') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Penyewa</span>
        </a>
        <a href="{{ route('owner.notifikasi.index') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('owner.notifikasi.*') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Notifikasi</span>
        </a>
    </nav>

    <div class="mt-auto flex flex-col gap-3">
        <a href="{{ route('logout') }}"
           class="block p-3 px-4 rounded-md font-semibold text-muted dark:text-dark-muted transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  hover:text-danger hover:border-danger/30 hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0">
            <span>Logout</span>
        </a>
    </div>
</aside>
