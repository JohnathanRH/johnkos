<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupancy;
use App\Models\Kamar;
use App\Models\Tenant;

class OccupancyController extends Controller
{
    public function assignment(Kamar $kamar){
        return view('owner.kamar.tambah-penyewa', ['kamar' => $kamar]);
    }

    public function assign(Request $request, Kamar $kamar){
        $validated = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'deadline' => ['date']
        ]);

        $tenant = Tenant::where([
            ['name', '=', $validated['name']],
            ['phone', '=', $validated['phone']],
        ])->first();

        if($tenant == null){
            return back()->with('Error', 'Akun Penyewa tidak ditemukan');
        }

        Occupancy::create([
            'kamar_id' => $kamar->id,
            'tenant_id' => $tenant->id,
            'deadline' => $validated['deadline']
        ]);

        return redirect()->route('owner.kamar.index');
    }
}
