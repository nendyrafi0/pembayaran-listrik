@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
        <h1 class="text-xl font-bold mb-4">Edit Admin</h1>

        <form action="{{ route('admin.update', $admin->id_user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama', $admin->nama) }}" required>
                @error('nama') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Username</label>
                <input type="text" name="username" class="w-full border rounded px-3 py-2" value="{{ old('username', $admin->username) }}" required>
                @error('username') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Password Baru <span class="text-sm text-gray-500">(opsional)</span></label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2">
                @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection
