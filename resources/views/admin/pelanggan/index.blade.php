@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold mb-4">Daftar Pelanggan</h1>
    <a href="{{ route('admin.pelanggan.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Pelanggan</a>

    @if(session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-2 py-1">Nama</th>
                <th class="border px-2 py-1">Email</th>
                <th class="border px-2 py-1">Daya</th>
                <th class="border px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan as $user)
                <tr>
                    <td class="border px-2 py-1">{{ $user->nama }}</td>
                    <td class="border px-2 py-1">{{ $user->email }}</td>
                    <td class="border px-2 py-1">{{ $user->tarifDaya->daya ?? 'N/A' }} VA</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('admin.pelanggan.edit', $user->id_user) }}" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
