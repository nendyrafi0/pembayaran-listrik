<?php

namespace App\Http\Controllers;
use App\Models\TarifDaya;

use Illuminate\Http\Request;

class TarifDayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TarifDaya::orderBy('daya')->get();
        return view('tarif-daya.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarif-daya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'daya' => 'required|integer|min:100',
            'tarif_per_kwh' => 'required|numeric|min:0',
        ]);

        TarifDaya::create($request->all());

        return redirect()->route('tarif-daya.index')->with('success', 'Tarif daya berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarif = TarifDaya::findOrFail($id);
        return view('tarif-daya.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'daya' => 'required|integer|min:100',
            'tarif_per_kwh' => 'required|numeric|min:0',
        ]);

        $tarif = TarifDaya::findOrFail($id);
        $tarif->update($request->all());

        return redirect()->route('tarif-daya.index')->with('success', 'Tarif daya berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarif = TarifDaya::findOrFail($id);
        $tarif->delete();

        return redirect()->route('tarif-daya.index')->with('success', 'Tarif daya berhasil dihapus.');
    }
}
