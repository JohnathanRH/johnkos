<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/login', function() {
//     return view('auth.login');
// })->name('login');

// Route::get('/logout', function() {
//     return redirect()->route('login');
// })->name('logout');


require __DIR__.'/owner.php';
require __DIR__.'/tenant.php';
require __DIR__.'/auth.php';