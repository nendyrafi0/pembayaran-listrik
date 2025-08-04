@extends('layouts.app')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Daftar Pembayaran</h1>

    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Pelanggan</th>
                <th class="px-4 py-2 border">Bulan Tagihan</th>
                <th class="px-4 py-2 border">Tanggal Bayar</th>
                <th class="px-4 py-2 border">Total Bayar</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayaran as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">
                        {{ $item->tagihan->penggunaan->user->nama ?? '-' }}
                    </td>
                    <td class="px-4 py-2 border">
                        {{ $item->tagihan->penggunaan->bulan ?? '-' }}/{{ $item->tagihan->penggunaan->tahun ?? '-' }}
                    </td>
                    <td class="px-4 py-2 border">{{ $item->tanggal_bayar }}</td>
                    <td class="px-4 py-2 border">Rp{{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('admin.pembayaran.show', $item->id_pembayaran) }}"
                            class="text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-2 border text-center">Belum ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
