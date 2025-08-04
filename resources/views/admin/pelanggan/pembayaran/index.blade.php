@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-semibold mb-4">Riwayat Pembayaran</h2>

    @if($pembayaran->isEmpty())
        <p>Tidak ada riwayat pembayaran.</p>
    @else
    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4 border">Tanggal Bayar</th>
                <th class="py-2 px-4 border">Bulan</th>
                <th class="py-2 px-4 border">Tahun</th>
                <th class="py-2 px-4 border">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $item)
                <tr>
                    <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d M Y') }}</td>
                    <td class="py-2 px-4 border">
                        {{ $item->tagihan->penggunaan->bulan ?? '-' }}
                    </td>
                    <td class="py-2 px-4 border">
                        {{ $item->tagihan->penggunaan->tahun ?? '-' }}
                    </td>
                    <td class="py-2 px-4 border">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
