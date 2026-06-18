@extends('app')

@section('title', 'Penyewa - JohnKos')
@section('header_title', 'Daftar Penyewa')

@section('content')
    {{-- <div class="mb-4 max-w-sm">
        <div class="relative flex items-center">
            <input type="text" id="searchInput" class="w-full py-3 px-5 rounded-full border border-transparent bg-surface dark:bg-dark-surface shadow-clay dark:shadow-dark-clay outline-none font-sans text-main dark:text-dark-main transition-all duration-200 ease-in-out pr-10" placeholder="Cari nama penyewa...">
            <button type="button" id="clearSearchBtn" class="absolute right-4 bg-none border-none text-2xl text-muted dark:text-dark-muted cursor-pointer transition-colors duration-200 hover:text-main dark:hover:text-dark-main" style="display: none;">&times;</button>
        </div>
    </div> --}}

    <div class="grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-6">
        @foreach ($occupancies as $occupancy)
        @php
            $initials = Str::of($occupancy->tenant->name)->initials();
            $deadline = \Carbon\Carbon::parse($occupancy->deadline);
            $daysRemaining = now()->diffInDays($deadline, false);
        @endphp
        <a href="{{ route('owner.penyewa.show', ['tenant' => 1]) }}" class="block bg-surface dark:bg-dark-surface rounded-md p-6 shadow-clay dark:shadow-dark-clay transition-all duration-300 ease-in-out border border-card-border dark:border-dark-card-border hover:shadow-clay-hover dark:hover:shadow-dark-clay-hover hover:-translate-y-0.5">
            <div class="flex gap-4 items-center mb-4">
                 <div class="w-[50px] h-[50px] rounded-full bg-primary dark:bg-dark-primary text-white flex items-center justify-center font-bold text-xl">
                    {{ $initials }}
                </div>
                 <div>
                     <h3 class="text-[20px] m-0 font-poppins font-semibold">
                        {{ $occupancy->tenant->name  }}
                    </h3>
                     <p class="text-muted dark:text-dark-muted text-sm">
                        {{ $occupancy->kamar->name }}
                    </p>
                 </div>
            </div>

            <div class="text-sm mb-2">
                <span class="text-muted dark:text-dark-muted">No. HP:</span>
                {{ $occupancy->tenant->phone }}
            </div>

            <div class="flex justify-between items-center text-sm border-t border-card-border dark:border-dark-card-border pt-3 mt-3">
                <span class="text-muted dark:text-dark-muted">
                    Status Bayar:
                </span>
                @if ($daysRemaining < 0)
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-warning text-[#78350f]">
                    Telat
                </span>
                @elseif ($daysRemaining <= 7)
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-warning text-[#78350f]">
                    Deadline datang
                </span>
                @else
                <span class="py-1 px-3 rounded-full text-xs font-bold uppercase bg-success text-[#14532d]">
                    Aman
                </span>
                @endif
            </div>
        </a>
            
        @endforeach
    </div>
@endsection

{{-- @push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const clearSearchBtn = document.getElementById('clearSearchBtn');

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearSearchBtn.style.display = searchInput.value.length > 0 ? 'block' : 'none';
            });
        }

        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', function() {
                searchInput.value = '';
                clearSearchBtn.style.display = 'none';
                searchInput.focus();
            });
        }
    });
</script>
@endpush --}}
