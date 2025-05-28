<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::insert([
            [
                'nama' => 'Pembayun Maya Riyani',
                'nis' => '20441',
                'gender' => 'P',
                'alamat' => 'Ngemplak Caban, Tridadi, Sleman, Sleman, Yogyakarta',
                'kontak' => '08583920970',
                'email' => '20441@sija.com',
                'status_pkl' => 0,
            ],
            [
                'nama' => 'Nur Chesya Puspitasari',
                'nis' => '20437',
                'gender' => 'P',
                'alamat' => 'Kaidsoka, Purwormatani, Kalasan, Sleman, D.I.Yogyakarta',
                'kontak' => '089023678544',
                'email' => '20437@sija.com',
                'status_pkl' => 0,
            ],
            [
                'nama' => 'Tsabita Irene Adielia',
                'nis' => '20455',
                'gender' => 'P',
                'alamat' => 'Kledongan, Sendangtirto, Berbah, Sleman, D.I.Yogyakarta',
                'kontak' => '08653489023',
                'email' => '20455@sija.com',
                'status_pkl' => 0,
            ],
            [
                'nama' => 'Yumna Putri Nurjanah',
                'nis' => '20458',
                'gender' => 'P',
                'alamat' => 'Nglahar, Sumbersari, Moyudan, Sleman, D.I.Yogyakarta',
                'kontak' => '085879081156',
                'email' => '20458@sija.com',
                'status_pkl' => 0,
            ],
        ]);
    }
}
