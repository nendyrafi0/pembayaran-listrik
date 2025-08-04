<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold text-center mb-4">Registrasi Pelanggan</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.process') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm">Username</label>
                <input type="text" name="username" class="w-full px-3 py-2 border rounded" value="{{ old('username') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full px-3 py-2 border rounded" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">No. Meter</label>
                <input type="text" name="no_meter" class="w-full px-3 py-2 border rounded" value="{{ old('no_meter') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Alamat</label>
                <textarea name="alamat" class="w-full px-3 py-2 border rounded">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Tarif Daya</label>
                <select name="tarif_daya_id" class="w-full px-3 py-2 border rounded" required>
                    <option value="">Pilih Tarif</option>
                    @foreach ($tarifList as $tarif)
                        <option value="{{ $tarif->id_tarif }}">{{ $tarif->daya }} VA - Rp {{ number_format($tarif->tarif_per_kwh) }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Daftar</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Sudah punya akun? Login</a>
        </div>
    </div>
</body>
</html>
