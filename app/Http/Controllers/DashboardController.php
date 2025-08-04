<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TarifDaya;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Super Admin
        $totalAdmin = User::where('role', 'admin')->count();
        $totalTarifDaya = TarifDaya::count();
        $totalPelanggan = User::where('role', 'pelanggan')->count();

        // Admin
        $jumlahPelanggan = User::where('role', 'pelanggan')->count();
        $tagihanBelumBayar = Tagihan::where('status', 'belum bayar')->count();
        $totalPembayaran = Pembayaran::sum('total_bayar');

        // Pelanggan
        $riwayatPembayaran = collect();
        $jumlahTransaksi = 0;

        if ($user->role === 'pelanggan') {
            $riwayatPembayaran = Pembayaran::whereHas('tagihan.penggunaan', function ($query) use ($user) {
                $query->where('id_user', $user->id_user);
            })->with('tagihan.penggunaan')->orderByDesc('tanggal_bayar')->get();

            $jumlahTransaksi = $riwayatPembayaran->count();
        }

        return view('dashboard.index', compact(
            'user',
            'totalAdmin',
            'totalTarifDaya',
            'totalPelanggan',
            'jumlahPelanggan',
            'tagihanBelumBayar',
            'totalPembayaran',
            'riwayatPembayaran',
            'jumlahTransaksi'
        ));
    }
}
