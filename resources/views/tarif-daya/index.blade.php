@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Kelola Tarif Daya</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tarif-daya.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 shadow">Tambah Tarif</a>

    <table class="w-full mt-4 table-auto">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Daya (VA)</th>
                <th class="px-4 py-2">Tarif / kWh</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->daya }} VA</td>
                    <td class="px-4 py-2">Rp {{ number_format($item->tarif_per_kwh) }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('tarif-daya.edit', $item->id_tarif) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('tarif-daya.destroy', $item->id_tarif) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="text-red-600 hover:underline ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($data->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
