<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PelangganPembayaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pembayaran = Pembayaran::with([
            'tagihan.penggunaan'
        ])
        ->whereHas('tagihan.penggunaan', function ($query) use ($user) {
            $query->where('id_user', $user->id_user);
        })
        ->latest()
        ->get();

        return view('admin.pelanggan.pembayaran.index', compact('pembayaran'));
    }
}
