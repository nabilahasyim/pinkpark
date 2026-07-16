<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Member;
use App\Models\TransaksiParkir;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Users
        User::firstOrCreate(
            ['email' => 'admin@pinkpark.com'],
            [
                'name' => 'Administrator',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]
        );

        User::firstOrCreate(
            ['email' => 'operator@pinkpark.com'],
            [
                'name' => 'Operator Parkir',
                'role' => 'operator',
                'password' => Hash::make('password')
            ]
        );

        // 2. Create Kategoris
        $katMotor = Kategori::firstOrCreate(
            ['kode_kategori' => 'KTG-01'],
            ['nama_kategori' => 'Motor', 'deskripsi' => 'Parkir untuk kendaraan roda dua']
        );
        
        $katMobil = Kategori::firstOrCreate(
            ['kode_kategori' => 'KTG-02'],
            ['nama_kategori' => 'Mobil', 'deskripsi' => 'Parkir untuk kendaraan roda empat']
        );

        // 3. Create Produks
        Produk::firstOrCreate(
            ['kode_produk' => 'PRD-01'],
            [
                'kategori_id' => $katMotor->id,
                'nama_produk' => 'Helm Bogo Retro',
                'harga' => 150000,
                'stok' => 20,
                'deskripsi' => 'Helm retro lucu warna pink'
            ]
        );

        Produk::firstOrCreate(
            ['kode_produk' => 'PRD-02'],
            [
                'kategori_id' => $katMobil->id,
                'nama_produk' => 'Parfum Mobil Pink',
                'harga' => 35000,
                'stok' => 50,
                'deskripsi' => 'Parfum mobil wangi stroberi'
            ]
        );

        // 4. Create Members
        $member1 = Member::firstOrCreate(
            ['kode_member' => 'MBR-01'],
            [
                'nama' => 'Siti Aisyah',
                'nomor_telepon' => '081234567890',
                'alamat' => 'Jl. Mawar No. 12',
                'jenis_kendaraan' => 'Motor',
                'nomor_polisi' => 'B 1234 ABC'
            ]
        );

        $member2 = Member::firstOrCreate(
            ['kode_member' => 'MBR-02'],
            [
                'nama' => 'Budi Santoso',
                'nomor_telepon' => '089876543210',
                'alamat' => 'Jl. Melati No. 45',
                'jenis_kendaraan' => 'Mobil',
                'nomor_polisi' => 'D 5678 EFG'
            ]
        );

        // 5. Create Transaksi Parkir
        if (TransaksiParkir::count() == 0) {
            TransaksiParkir::create([
                'kode_transaksi' => 'TRX-' . time(),
                'member_id' => $member1->id,
                'nomor_polisi' => $member1->nomor_polisi,
                'jenis_kendaraan' => $member1->jenis_kendaraan,
                'waktu_masuk' => now()->subHours(2),
                'waktu_keluar' => now(),
                'tarif' => 5000,
                'status' => 'Keluar'
            ]);

            TransaksiParkir::create([
                'kode_transaksi' => 'TRX-' . (time() + 1),
                'member_id' => $member2->id,
                'nomor_polisi' => $member2->nomor_polisi,
                'jenis_kendaraan' => $member2->jenis_kendaraan,
                'waktu_masuk' => now()->subMinutes(30),
                'tarif' => 0,
                'status' => 'Masuk'
            ]);
        }
    }
}
