<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index(){
        $kamars = auth()->user()->kost->kamars;
        return view('owner.kamar.daftar-kamar',[
            'kamars' => $kamars
        ]);
    }

    public function create(){
        return view('owner.kamar.tambah-kamar');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'floor' => ['required'],
            'price' => ['required','decimal:1,5'],
            'facilities' => ['required'],
            'length' => ['required','decimal:1,10'],
            'width' => ['required','decimal:1,10'],
        ]);
        $validated['facilities'] = explode(', ', $validated['facilities']);
        // dd($validated);
        $kost = auth()->user()->kost;
        $kost->kamars()->create($validated);
        return redirect()->route('owner.kamar.index');
    }

    public function show(Kamar $kamar){
        return view('owner.kamar.detail-kamar', [
            'kamar' => $kamar,
        ]);
    }

    public function edit(Kamar $kamar){
        return view('owner.kamar.edit-kamar', [
            'kamar' => $kamar,
        ]);
    }

    public function update(Request $request, Kamar $kamar){
        $validated = $request->validate([
            'name' => ['required'],
            'floor' => ['required'],
            'price' => ['required','decimal:1,5'],
            'facilities' => ['required'],
            'length' => ['required','decimal:1,10'],
            'width' => ['required','decimal:1,10'],
        ]);
        $validated['facilities'] = explode(', ', $validated['facilities']);
        
        $kamar->update($validated);
        return redirect()->route('owner.kamar.index');
    }
}
