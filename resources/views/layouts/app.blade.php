<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Listrik</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col md:flex-row">

        {{-- Sidebar --}}
        <aside class="bg-white shadow-md w-full md:w-64 p-4 space-y-6 md:min-h-screen">
            <div class="text-2xl font-bold text-indigo-600">PLN Panel</div>

            <nav class="flex flex-col space-y-2">
                <a href="{{ route('dashboard') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">
                    Dashboard
                </a>

                @if(auth()->user()->role === 'super admin')
                    <a href="{{ route('admin.index') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">Manajemen Admin</a>
                    <a href="{{ route('tarif-daya.index') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">Tarif Daya</a>
                @endif

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.pelanggan.index') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">Kelola Pelanggan</a>
                    <a href="{{ route('admin.pembayaran.index') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">Kelola Pembayaran</a>
                @endif

                @if(auth()->user()->role === 'pelanggan')
                    <a href="{{ route('pelanggan.tagihan') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">Tagihan</a>
                    <a href="{{ route('admin.pelanggan.pembayaran.index') }}" class="hover:bg-indigo-100 px-3 py-2 rounded transition">Riwayat Pembayaran</a>
                @endif
            </nav>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="mt-6 w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            <header class="mb-6">
                <h1 class="text-2xl font-semibold">Halo, {{ auth()->user()->nama }}</h1>
                <p class="text-sm text-gray-500 capitalize">{{ auth()->user()->role }}</p>
            </header>

            {{-- Main Content Slot --}}
            @yield('content')
        </main>
    </div>

</body>
</html>
