<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function index(){
        // dd(auth()->user());
        return view('owner.dashboard.dashboard-utama', [
            // 'owner' => auth()->user()
        ]);
    }

    public function show(){
        
    }
}
