@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar Tagihan Anda</h2>

    @if(session('success'))
        <div class="p-3 mb-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="p-3 mb-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
            {{ session('info') }}
        </div>
    @endif

    @if($tagihan->isEmpty())
        <div class="text-gray-700">Anda tidak memiliki tagihan saat ini.</div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                        <th class="py-2 px-4 border">Bulan</th>
                        <th class="py-2 px-4 border">Tahun</th>
                        <th class="py-2 px-4 border">Jumlah Pemakaian</th>
                        <th class="py-2 px-4 border">Jumlah Tagihan</th>
                        <th class="py-2 px-4 border">Status</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800">
                    @foreach($tagihan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border">{{ $item->penggunaan->bulan }}</td>
                        <td class="py-2 px-4 border">{{ $item->penggunaan->tahun }}</td>
                        <td class="py-2 px-4 border">{{ $item->penggunaan->jumlah_meter }} kWh</td>
                        <td class="py-2 px-4 border">Rp {{ number_format($item->jumlah_tagihan, 0, ',', '.') }}</td>
                        <td class="py-2 px-4 border">
                            <span class="{{ strtolower($item->status) === 'sudah bayar' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border">
                            @if(strtolower($item->status) === 'belum bayar')
                                <a href="{{ route('pelanggan.tagihan.showBayar', $item->id_tagihan) }}"
                                   class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded text-sm inline-block">
                                    Bayar
                                </a>
                            @else
                                <span class="text-gray-500">Lunas</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
