<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $kostId = optional(auth()->user()->kost)->id;
        $perPage = $request->query('per_page', 5);
        $notifications = Notification::where('kost_id', $kostId)
                                     ->latest()
                                     ->paginate($perPage)
                                     ->withQueryString();
        return view('owner.riwayat.daftar-riwayat', compact('notifications', 'perPage'));
    }
}
