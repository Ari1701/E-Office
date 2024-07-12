<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Admin', 'role' => 'admin'],
            ['name' => 'Direktur Utama', 'role' => 'director'],
            ['name' => 'Sekertaris', 'role' => 'secretary'],
            ['name' => 'Komite & Tim', 'role' => 'komitetim'],
            ['name' => 'Direktur Medis', 'role' => 'medis'],
            ['name' => 'Direktur Umum', 'role' => 'umum'],
            ['name' => 'Manajer Pelayanan & Penunjang Medis', 'role' => 'mppm'],
            ['name' => 'Manajer Keperawatan & Kebidanan', 'role' => 'mkk'],
            ['name' => 'KSM Manajer', 'role' => 'ksmmanajer'],
            ['name' => 'Tim Khusus Medis', 'role' => 'tkmmanajer'],
            ['name' => 'Manajer SDI & Umum', 'role' => 'msu'],
            ['name' => 'Manajer ADM. & Keuangan', 'role' => 'mak'],
            ['name' => 'Tim Khusus IT', 'role' => 'tkit'],
            ['name' => 'Kepala Instalasi Gawat Darurat', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Rawat Jalan', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Rawat Inap', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Anestesi & Perawatan Instensif', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Hemodialisis', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Bedah Sentral', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Kamar Bersalin & Perinatal', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Farmasi', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Rekam Medis', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Gizi', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Laboratorium', 'role' => 'kains'],
            ['name' => 'Kepala Instalasi Radiologi', 'role' => 'kains'],
            ['name' => 'Koordinator Kep. IGD', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Rawat Jalan', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Rawat Inap 3', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Rawat Inap 4', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Rawat Inap 5', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Anestesi & Perawatan Intensif', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Hemodialisis', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Bedah Sentral', 'role' => 'kep'],
            ['name' => 'Koordinator Kep. Kamar Bersalin & Perinatal', 'role' => 'kep'],
            ['name' => 'KSM Bedah', 'role' => 'ksm'],
            ['name' => 'KSM Non Bedah', 'role' => 'ksm'],
            ['name' => 'KSM Penunjang', 'role' => 'ksm'],
            ['name' => 'KSM Gigi Dan Umum', 'role' => 'ksm'],
            ['name' => 'KSM Anestesi', 'role' => 'ksm'],
            ['name' => 'Manajer Pelayanan Pasien', 'role' => 'tkm'],
            ['name' => 'Casemix', 'role' => 'tkm'],
            ['name' => 'Kepala Bagian SDI', 'role' => 'kabagsdi'],
            ['name' => 'Kepala Bagian Humas & PKRS', 'role' => 'kabaghumas'],
            ['name' => 'Kepala Bagian IPSRS & Rumah Tangga', 'role' => 'kabagipsrs'],
            ['name' => 'Kepala Bagian ADM & Keuangan', 'role' => 'kabagadm'],
            ['name' => 'TIM IT', 'role' => 'tku'],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'username' => Str::lower($user['name']),
                'password' => Hash::make('1234'),
                'role' => $user['role'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
