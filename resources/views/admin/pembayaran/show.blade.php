@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Detail Pembayaran</h1>

        <div class="space-y-2">
            <p><strong>ID Pembayaran:</strong> {{ $pembayaran->id_pembayaran }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $item->tagihan->penggunaan->user->nama ?? '-' }}</p>
            <p><strong>Tagihan:</strong> {{ $item->tagihan->penggunaan->bulan ?? '-' }}/{{ $item->tagihan->penggunaan->tahun ?? '-' }}</p>
            <p><strong>Total Bayar:</strong> Rp {{ number_format($pembayaran->total_bayar) }}</p>
            <p><strong>Tanggal Bayar:</strong> {{ $pembayaran->tanggal_bayar }}</p>
        </div>

        <a href="{{ route('admin.pembayaran.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">← Kembali</a>
    </div>
@endsection
s