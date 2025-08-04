@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold mb-4">Tambah Pelanggan</h1>

    <form action="{{ route('admin.pelanggan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="nama" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Username</label>
            <input type="text" name="username" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Tarif Daya</label>
            <select name="tarif_daya_id" class="w-full border p-2" required>
                @foreach($tarif as $item)
                    <option value="{{ $item->id_tarif }}">{{ $item->daya }} VA</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
