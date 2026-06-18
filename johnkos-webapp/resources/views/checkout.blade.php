<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - {{ $occupancy->kamar->name }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" 
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
</head>
<body class="bg-slate-50 dark:bg-slate-900 min-h-screen flex items-center justify-center p-4 antialiased transition-colors duration-300">

    <div class="w-full max-w-md bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-xl border border-slate-100 dark:border-slate-700/50">
        <div class="text-center mb-6">
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/40 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <h1 class="text-xl font-bold font-sans text-slate-800 dark:text-slate-100">Konfirmasi Pembayaran</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Selesaikan invoice sewa kamar Anda</p>
        </div>

        <div class="bg-slate-50 dark:bg-slate-700/30 rounded-2xl p-4 mb-6 border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-center pb-3 border-b border-slate-200/60 dark:border-slate-700">
                <span class="text-xs font-semibold tracking-wider uppercase text-slate-400 dark:text-slate-500">Item / Kamar</span>
                <span class="font-bold text-sm text-slate-700 dark:text-slate-200 bg-blue-50 dark:bg-blue-950/50 px-2.5 py-1 rounded-lg">
                    {{ $occupancy->kamar->name }}
                </span>
            </div>
            <div class="flex justify-between items-center pt-3">
                <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Tagihan</span>
                <span class="text-xl font-extrabold text-slate-900 dark:text-slate-100 tracking-tight">
                    Rp {{ number_format($occupancy->kamar->price, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <div class="space-y-3">
            <button id="pay-button" class="w-full py-3.5 px-6 border border-transparent rounded-full font-semibold font-sans cursor-pointer transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] text-center bg-blue-600 hover:bg-blue-700 text-white hover:-translate-y-0.5 active:translate-y-0 shadow-lg shadow-blue-500/20 active:shadow-sm">
                Bayar Sekarang
            </button>
            
            <a href="{{ route('tenant.dashboard') }}" class="block w-full text-center py-2 text-sm font-medium text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    console.log(result);
                    window.location.href = '/tenant/dashboard';
                },
                onPending: function(result){
                    console.log(result);
                    window.location.href = '/home?payment=pending';
                },
                onError: function(result){
                    console.log(result);
                    alert("Pembayaran gagal, silakan coba beberapa saat lagi.");
                },
                onClose: function(){
                    console.log('User closed the snap overlay modal.');
                }
            });
        });
    </script>
</body>
</html>