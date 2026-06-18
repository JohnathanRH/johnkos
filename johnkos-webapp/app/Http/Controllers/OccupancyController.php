<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupancy;
use App\Models\Kamar;

class OccupancyController extends Controller
{
    public function assignment(Kamar $kamar){
        return view('owner.kamar.tambah-penyewa', ['kamar' => $kamar]);
    }
}
