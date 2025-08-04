@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Tambah Tarif Daya</h1>

    <form action="{{ route('tarif-daya.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Daya (VA)</label>
            <input type="number" name="daya" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Tarif per kWh</label>
            <input type="number" name="tarif_per_kwh" step="0.01" class="w-full border p-2 rounded" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">Simpan</button>
        <a href="{{ route('tarif-daya.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
    </form>
</div>
@endsection
