<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganTagihanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tagihan = Tagihan::with(['penggunaan', 'pembayaran'])
            ->whereHas('penggunaan', function ($query) use ($user) {
                $query->where('id_user', $user->id_user);
            })
            ->latest()
            ->get();

        return view('pelanggan.tagihan.index', compact('tagihan'));
    }

    public function showBayar($id)
    {
        $tagihan = Tagihan::with(['penggunaan'])->findOrFail($id);

        if (strtolower($tagihan->status) === 'sudah bayar') {
            return redirect()->route('pelanggan.tagihan')->with('info', 'Tagihan ini sudah dibayar.');
        }

        return view('pelanggan.tagihan.bayar', compact('tagihan'));
    }

    public function bayar(Request $request, $id)
    {
        $tagihan = Tagihan::with('penggunaan')->findOrFail($id);

        if (strtolower($tagihan->status) === 'sudah bayar') {
            return redirect()->back()->with('info', 'Tagihan ini sudah dibayar.');
        }

    Pembayaran::create([
        'id_tagihan'    => $tagihan->id_tagihan,
        'tanggal_bayar' => now(),
        'total_bayar'   => $tagihan->jumlah_tagihan,
        'biaya_admin'   => 2500,
        'id_admin'      => 1,
    ]);

        $tagihan->update(['status' => 'sudah bayar']);

        return redirect()->route('pelanggan.tagihan')->with('success', 'Tagihan berhasil dibayar.');
    }
}
