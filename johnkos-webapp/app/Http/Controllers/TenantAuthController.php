<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantAuthController extends Controller
{

    public function form(){
        return view('auth.tenant-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'phone'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('tenant')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/tenant/dashboard');
        }

        return back()->withErrors([
            'phone' => 'Credentials do not match our tenant records.',
        ]);
    }

    public function logout(Request $request){
        Auth::guard('tenant')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('tenant.login.form');
    }
}
