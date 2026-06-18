<aside class="w-[280px] h-screen sticky top-0 overflow-y-auto bg-surface dark:bg-dark-surface p-8 flex flex-col gap-8 border-r-2 border-card-border dark:border-dark-card-border shadow-clay dark:shadow-dark-clay z-10 transition-all duration-300">
    <div class="text-center">
        <h1 class="text-primary dark:text-dark-primary text-[28px] font-poppins font-semibold">JohnKos</h1>
    </div>

    <nav class="flex flex-col gap-3">
        <a href="{{ route('tenant.dashboard') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('tenant.dashboard') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Dashboard</span>
        </a>
        <a href="{{ route('tenant.room') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('tenant.kamar.*') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Kamar</span>
        </a>
        <a href="{{ route('tenant.history') }}"
           class="block p-3 px-4 rounded-md font-semibold transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] border border-transparent
                  {{ request()->routeIs('tenant.history') ?
                  'bg-primary dark:bg-dark-primary text-white shadow-clay dark:shadow-dark-clay' :
                  'text-muted dark:text-dark-muted hover:text-primary dark:hover:text-dark-primary hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5 hover:bg-surface dark:hover:bg-dark-surface hover:border-card-border dark:hover:border-dark-card-border active:shadow-clay-active dark:active:shadow-dark-clay-active active:translate-y-0' }}">
            <span>Riwayat Pembayaran</span>
        </a>
    </nav>

    <div class="mt-auto flex flex-col gap-3">
        <form method="POST" action="{{ route('tenant.login.destroy') }}">
            @csrf
            <button type="submit">
            Log Out</button>
        </form>
    </div>
</aside>
