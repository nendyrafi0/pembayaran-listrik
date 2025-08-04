@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-xl font-semibold mb-4">Pembayaran Tagihan</h2>

    <div class="bg-white p-4 shadow rounded border border-gray-200">
        <p><strong>Bulan:</strong> {{ $tagihan->penggunaan->bulan }}</p>
        <p><strong>Tahun:</strong> {{ $tagihan->penggunaan->tahun }}</p>
        <p><strong>Jumlah Pemakaian:</strong> {{ $tagihan->penggunaan->jumlah_meter }} kWh</p>
        <p><strong>Total Tagihan:</strong> Rp {{ number_format($tagihan->jumlah_tagihan, 0, ',', '.') }}</p>

        <form action="{{ route('pelanggan.tagihan.bayar', $tagihan->id_tagihan) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Bayar Sekarang
            </button>
            <a href="{{ route('pelanggan.tagihan') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
</div>
@endsection
