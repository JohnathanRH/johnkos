<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupancy;

class KostController extends Controller
{
    public function index(){
        $owner = auth()->user();
        $kost = $owner->kost()->with('kamars.occupancy')->first();
        $occupancies = $kost->kamars->pluck('occupancy')->filter();
        $nearDues = Occupancy::whereIn('kamar_id', $kost->kamars->pluck('id'))
                        ->whereBetween('deadline', [now(), now()->addDays(7)])
                        ->get();
        $notifications = $kost->notifications;

        return view('owner.dashboard.dashboard-utama', [
            'owner' => $owner,
            'kost' => $kost,
            'occupancies' => $occupancies,
            'nearDues' => $nearDues,
            'notifications' => $notifications
        ]);
    }

    public function show(){
         
    }
}
