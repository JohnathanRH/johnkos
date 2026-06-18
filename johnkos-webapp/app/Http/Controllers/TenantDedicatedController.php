<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;

class TenantDedicatedController extends Controller
{
    public function dashboard(){
        $kost = Kost::whereHas('kamars.occupancy.tenant', function ($query) {
            $query->where('tenant_id', auth()->id());
        })->first();
        $kamar = auth('tenant')->user()->occupancy->kamar;

        return view('tenant.dashboard.dashboard', [
            'kost' => $kost,
            'kamar' => $kamar
        ]);
    }

    public function room(){
        $kamar = auth('tenant')->user()->occupancy->kamar;
        return view('tenant.room.room', [
            'kamar' => $kamar,
        ]);
    }
}
