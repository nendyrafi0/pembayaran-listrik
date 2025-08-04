<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TarifDaya;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard.index', ['user' => Auth::user()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        $tarifList = TarifDaya::all();
        return view('auth.register', compact('tarifList'));
    }

    public function processRegister(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed',
            'nama' => 'required|string',
            'no_meter' => 'required|unique:users,no_meter',
            'alamat' => 'nullable|string',
            'tarif_daya_id' => 'required|exists:tarif_daya,id_tarif',
            'role' => 'pelanggan',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'password' => $validated['password'],
            'nama' => $validated['nama'],
            'no_meter' => $validated['no_meter'],
            'alamat' => $validated['alamat'],
            'tarif_daya_id' => $validated['tarif_daya_id'],
            'role' => 'pelanggan',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}