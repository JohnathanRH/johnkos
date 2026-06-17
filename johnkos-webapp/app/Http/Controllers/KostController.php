<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function index(){
        return view('owner.dashboard.dashboard-utama', [
            'owner' => auth()->user(),
            'kost' => auth()->user()->kost,
        ]);
    }

    public function show(){
        
    }
}
