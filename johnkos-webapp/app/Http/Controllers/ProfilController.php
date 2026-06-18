<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfilController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string',
            'kost_name' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        if ($user->kost) {
            $user->kost->update([
                'name' => $request->filled('kost_name') ? $request->kost_name : $user->kost->name,
                'address' => $request->address,
            ]);
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
