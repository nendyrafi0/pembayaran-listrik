@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold">Dashboard</h1>
    <p class="text-gray-600 mt-2">Selamat datang, {{ $user->nama }} ({{ $user->role }})</p>

    {{-- Super Admin --}}
    @if ($user->role === 'super admin')
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-blue-700">Total Admin</h2>
                <p class="text-2xl font-bold text-blue-900 mt-2">{{ $totalAdmin }} Admin</p>
            </div>
            <div class="bg-blue-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-blue-700">Total Tarif Daya</h2>
                <p class="text-2xl font-bold text-blue-900 mt-2">{{ $totalTarifDaya }} Jenis</p>
            </div>
            <div class="bg-blue-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-blue-700">Total Pengguna</h2>
                <p class="text-2xl font-bold text-blue-900 mt-2">{{ $totalPelanggan }} User</p>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.index') }}" class="block p-4 rounded shadow bg-stone-50 hover:shadow-lg transition border-2">
                <h3 class="font-semibold text-blue-800">Kelola Admin</h3>
                <p class="text-sm text-blue-700">Manajemen akun admin</p>
            </a>
            <a href="{{ route('tarif-daya.index') }}" class="block p-4 rounded shadow bg-stone-50 hover:shadow-lg transition border-2">
                <h3 class="font-semibold text-blue-800">Kelola Tarif Daya</h3>
                <p class="text-sm text-blue-700">Manajemen tarif dan daya</p>
            </a>
        </div>
    @endif

    {{-- Admin --}}
    @if ($user->role === 'admin')
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-green-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-green-700">Jumlah Pelanggan</h2>
                <p class="text-2xl font-bold text-green-800 mt-2">{{ $jumlahPelanggan }} Pelanggan</p>
            </div>
            <div class="bg-green-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-green-700">Tagihan Belum Bayar</h2>
                <p class="text-2xl font-bold text-green-800 mt-2">{{ $tagihanBelumBayar }} Tagihan</p>
            </div>
            <div class="bg-green-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-green-700">Total Pembayaran</h2>
                <p class="text-2xl font-bold text-green-800 mt-2">Rp {{ number_format($totalPembayaran) }}</p>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.pelanggan.index') }}" class="block p-4 rounded shadow bg-stone-50 hover:shadow-lg transition border-2">
                <h3 class="font-semibold text-green-800">Kelola Pelanggan</h3>
                <p class="text-sm text-green-700">Manajemen data pelanggan</p>
            </a>
            <a href="{{ route('admin.pembayaran.index') }}" class="block p-4 rounded shadow bg-stone-50 hover:shadow-lg transition border-2">
                <h3 class="font-semibold text-green-800">Kelola Pembayaran</h3>
                <p class="text-sm text-green-700">Verifikasi pembayaran</p>
            </a>
        </div>
    @endif

    {{-- Pelanggan --}}
    @if ($user->role === 'pelanggan')
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-yellow-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-yellow-700">Tagihan Bulan Ini</h2>
                <p class="text-2xl font-bold text-yellow-800 mt-2">Rp {{ number_format(185000) }}</p>
            </div>
            <div class="bg-yellow-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-yellow-700">Riwayat Pembayaran</h2>
                <p class="text-2xl font-bold text-yellow-800 mt-2">{{ $jumlahTransaksi }} Transaksi</p>
            </div>
            <div class="bg-yellow-100 p-4 rounded shadow text-center hover:shadow-lg transition">
                <h2 class="text-sm font-semibold text-yellow-700">Daya Terdaftar</h2>
                <p class="text-2xl font-bold text-yellow-800 mt-2">{{ $user->tarifDaya->daya ?? 'N/A' }} VA</p>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('pelanggan.tagihan') }}" class="block p-4 rounded shadow bg-stone-50 hover:shadow-lg transition border-2">
                <h3 class="font-semibold text-yellow-800">Lihat Tagihan</h3>
                <p class="text-sm text-yellow-700">Lihat tagihan Anda</p>
            </a>
            <a href="{{ route('admin.pelanggan.pembayaran.index') }}" class="block p-4 rounded shadow bg-stone-50 hover:shadow-lg transition border-2">
                <h3 class="font-semibold text-yellow-800">Riwayat Pembayaran</h3>
                <p class="text-sm text-yellow-700">Lihat transaksi sebelumnya</p>
            </a>
        </div>

        {{-- Riwayat Pembayaran Detail --}}
        <div class="mt-10">
            <h2 class="text-lg font-bold text-gray-800 mb-3">Riwayat Pembayaran Anda</h2>
            @if ($riwayatPembayaran->isEmpty())
                <p class="text-sm text-gray-600">Belum ada transaksi pembayaran.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border border-gray-200 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2 text-left">Tanggal Bayar</th>
                                <th class="border px-4 py-2 text-left">Total Bayar</th>
                                <th class="border px-4 py-2 text-left">Biaya Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatPembayaran as $pembayaran)
                                <tr class="hover:bg-yellow-50">
                                    <td class="border px-4 py-2">{{ $pembayaran->tanggal_bayar }}</td>
                                    <td class="border px-4 py-2">Rp {{ number_format($pembayaran->total_bayar) }}</td>
                                    <td class="border px-4 py-2">Rp {{ number_format($pembayaran->biaya_admin) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @endif
</div>
@endsection
