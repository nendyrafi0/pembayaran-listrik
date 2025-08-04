@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Pelanggan</h1>

    <form action="{{ route('admin.pelanggan.update', $pelanggan->id_user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $pelanggan->nama }}" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Username</label>
            <input type="text" name="username" value="{{ $pelanggan->username }}" class="w-full border p-2" required>
        </div>
        <div class="mb-4">
            <label>Tarif Daya</label>
            <select name="tarif_daya_id" class="w-full border p-2" required>
                @foreach($tarif as $item)
                    <option value="{{ $item->id_tarif }}" {{ $pelanggan->tarif_daya_id == $item->id_tarif ? 'selected' : '' }}>
                        {{ $item->daya }} VA
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
