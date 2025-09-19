<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Laporan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'whatsapp' => '6281111111111',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat User
        $user = User::create([
            'name' => 'User Demo',
            'username' => 'userdemo',
            'email' => 'user@example.com',
            'whatsapp' => '6281222222222',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Buat 6 laporan untuk user
        // $laporans = [
        //     [
        //         'judul' => 'Jalan Rusak',
        //         'deskripsi' => 'Jalan di depan sekolah penuh lubang dan membahayakan pengguna motor.',
        //         'tanggal' => now()->subDays(10),
        //         'gambar' => 'jalan_rusak.jpg',
        //         'status' => 'pending',
        //     ],
        //     [
        //         'judul' => 'Lampu Jalan Mati',
        //         'deskripsi' => 'Lampu jalan di gang RT 03 sudah mati sejak 2 minggu lalu.',
        //         'tanggal' => now()->subDays(9),
        //         'gambar' => 'lampu_jalan.jpg',
        //         'status' => 'pending',
        //     ],
        //     [
        //         'judul' => 'Sampah Menumpuk',
        //         'deskripsi' => 'TPS di dekat pasar belum diangkut dan menimbulkan bau.',
        //         'tanggal' => now()->subDays(7),
        //         'gambar' => 'sampah.jpg',
        //         'status' => 'diproses',
        //     ],
        //     [
        //         'judul' => 'Saluran Air Tersumbat',
        //         'deskripsi' => 'Saluran air di perumahan Banjir Mas, air meluap saat hujan.',
        //         'tanggal' => now()->subDays(5),
        //         'gambar' => 'saluran_air.jpg',
        //         'status' => 'diproses',
        //     ],
        //     [
        //         'judul' => 'Pohon Tumbang',
        //         'deskripsi' => 'Pohon tumbang menutup jalan utama dan berbahaya.',
        //         'tanggal' => now()->subDays(3),
        //         'gambar' => 'pohon_tumbang.jpg',
        //         'status' => 'selesai',
        //         'respon' => 'Sudah dibersihkan oleh petugas.',
        //     ],
        //     [
        //         'judul' => 'Kebocoran Pipa Air',
        //         'deskripsi' => 'Pipa PDAM bocor di depan rumah warga sehingga jalan becek.',
        //         'tanggal' => now()->subDays(1),
        //         'gambar' => 'pipa_bocor.jpg',
        //         'status' => 'selesai',
        //         'respon' => 'Perbaikan sudah dilakukan.',
        //     ],
        // ];

        // foreach ($laporans as $laporan) {
        //     Laporan::create(array_merge($laporan, [
        //         'user_id' => $user->id,
        //     ]));
        // }
    }
}