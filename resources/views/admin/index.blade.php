@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Daftar Admin</h1>
            <a href="{{ route('admin.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Admin</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-left border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Username</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $admin->nama }}</td>
                        <td class="px-4 py-2 border">{{ $admin->username }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('admin.edit', $admin->id_user) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.destroy', $admin->id_user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-2 border text-center">Belum ada admin.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
