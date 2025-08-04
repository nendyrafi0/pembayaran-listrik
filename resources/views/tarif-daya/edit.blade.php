@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Tarif Daya</h1>

    <form action="{{ route('tarif-daya.update', $tarif->id_tarif) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Daya (VA)</label>
            <input type="number" name="daya" class="w-full border p-2 rounded" value="{{ $tarif->daya }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Tarif per kWh</label>
            <input type="number" name="tarif_per_kwh" step="0.01" class="w-full border p-2 rounded" value="{{ $tarif->tarif_per_kwh }}" required>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 shadow">Update</button>
        <a href="{{ route('tarif-daya.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
    </form>
</div>
@endsection
