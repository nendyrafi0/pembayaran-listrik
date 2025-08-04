<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TarifDaya;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = User::where('role', 'pelanggan')->get();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        $tarif = TarifDaya::all();
        return view('admin.pelanggan.create', compact('tarif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|min:6',
            'tarif_daya_id' => 'required|exists:tarif_daya,id_tarif',
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password, // bcrypt udah di model
            'role' => 'pelanggan',
            'tarif_daya_id' => $request->tarif_daya_id,
        ]);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = User::where('role', 'pelanggan')->findOrFail($id);
        $tarif = TarifDaya::all();
        return view('admin.pelanggan.edit', compact('pelanggan', 'tarif'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = User::where('role', 'pelanggan')->findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $id . ',id_user',
            'tarif_daya_id' => 'required|exists:tarif_daya,id_tarif',
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'tarif_daya_id' => $request->tarif_daya_id,
        ]);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }
}
