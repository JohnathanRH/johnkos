<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index(){
        $occupancies = auth()->user()->kost->occupancies;

        return view('owner.penyewa.daftar-penyewa', [
            'occupancies' => $occupancies,
        ]);
    }

    public function show(Tenant $tenant){
        
        return view('owner.penyewa.detail-penyewa', [
            'tenant' => $tenant,
        ]);
    }
}
