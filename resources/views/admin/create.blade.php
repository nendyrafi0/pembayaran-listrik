@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
        <h1 class="text-xl font-bold mb-4">Tambah Admin Baru</h1>

        <form action="{{ route('admin.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama') }}" required>
                @error('nama') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Username</label>
                <input type="text" name="username" class="w-full border rounded px-3 py-2" value="{{ old('username') }}" required>
                @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
@endsection
