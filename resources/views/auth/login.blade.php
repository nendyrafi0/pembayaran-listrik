<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm p-6 bg-white rounded shadow-md">

        <h1 class="text-xl font-bold mb-4 text-center">Login</h1>

        {{-- Success Flash --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm">Username</label>
                <input type="text" name="username" class="w-full px-3 py-2 border rounded" value="{{ old('username') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-blue-600 text-sm hover:underline">Belum punya akun? Daftar di sini</a>
        </div>
    </div>
</body>
</html>
