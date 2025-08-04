<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('tagihan.penggunaan.user')->latest()->get();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('tagihan.penggunaan.user')->findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }
}
