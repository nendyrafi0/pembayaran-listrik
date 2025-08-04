<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tarif Daya
        DB::table('tarif_daya')->insert([
            [
                'daya' => 1300,
                'tarif_per_kwh' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'daya' => 2200,
                'tarif_per_kwh' => 1700,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'daya' => 3500,
                'tarif_per_kwh' => 1850,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Users
        DB::table('users')->insert([
            [
                'id_user' => 1,
                'username' => 'superadmin',
                'password' => Hash::make('superadmin123'),
                'nama' => 'Super Admin',
                'role' => 'super admin',
                'no_meter' => null,
                'alamat' => 'Kantor Pusat',
                'tarif_daya_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2,
                'username' => 'nendy0',
                'password' => Hash::make('admin123'),
                'nama' => 'Nendy Rafi Akmal Manik',
                'role' => 'admin',
                'no_meter' => null,
                'alamat' => 'Kantor Cabang',
                'tarif_daya_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3,
                'username' => 'miftah0',
                'password' => Hash::make('pelanggan123'),
                'nama' => 'Muhammad Miftah',
                'role' => 'pelanggan',
                'no_meter' => '1234567890',
                'alamat' => 'Jalan Mawar No.1',
                'tarif_daya_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 4,
                'username' => 'bobby0',
                'password' => Hash::make('pelanggan123'),
                'nama' => 'Mohammad Riky Firmansyah',
                'role' => 'pelanggan',
                'no_meter' => '1234567891',
                'alamat' => 'Jalan Melati No.2',
                'tarif_daya_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 5,
                'username' => 'barata0',
                'password' => Hash::make('pelanggan123'),
                'nama' => 'Barata Candradasa',
                'role' => 'pelanggan',
                'no_meter' => '1234567892',
                'alamat' => 'Jalan Kenanga No.3',
                'tarif_daya_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Penggunaan
        DB::table('penggunaan')->insert([
            [
                'id_penggunaan' => 1,
                'id_user' => 3,
                'bulan' => 7,
                'tahun' => 2025,
                'meter_awal' => 1200,
                'meter_akhir' => 1350,
                'tanggal_catat' => '2025-07-01',
                'dicatat_oleh' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_penggunaan' => 2,
                'id_user' => 4,
                'bulan' => 7,
                'tahun' => 2025,
                'meter_awal' => 2100,
                'meter_akhir' => 2300,
                'tanggal_catat' => '2025-07-01',
                'dicatat_oleh' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_penggunaan' => 3,
                'id_user' => 5,
                'bulan' => 7,
                'tahun' => 2025,
                'meter_awal' => 3000,
                'meter_akhir' => 3200,
                'tanggal_catat' => '2025-07-01',
                'dicatat_oleh' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Tagihans
        DB::table('tagihan')->insert([
            [
                'id_tagihan' => 1,
                'id_penggunaan' => 1,
                'jumlah_meter' => 150,
                'jumlah_tagihan' => 150000,
                'status' => 'Sudah Bayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tagihan' => 2,
                'id_penggunaan' => 2,
                'jumlah_meter' => 200,
                'jumlah_tagihan' => 200000,
                'status' => 'Belum Bayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tagihan' => 3,
                'id_penggunaan' => 3,
                'jumlah_meter' => 200,
                'jumlah_tagihan' => 200000,
                'status' => 'Sudah Bayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Pembayaran
        DB::table('pembayaran')->insert([
            [
                'id_tagihan' => 1,
                'tanggal_bayar' => '2025-07-15',
                'biaya_admin' => 2500,
                'total_bayar' => 150 * 1500 + 2500,
                'created_at' => now(),
                'updated_at' => now(),
                'id_admin' => 1,
            ],
            [
                'id_tagihan' => 3,
                'tanggal_bayar' => '2025-07-18',
                'biaya_admin' => 2500,
                'total_bayar' => 200 * 1850 + 2500,
                'created_at' => now(),
                'updated_at' => now(),
                'id_admin' => 1,
            ],
        ]);
    }
}
