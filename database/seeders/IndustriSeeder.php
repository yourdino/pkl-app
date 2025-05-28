<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Industri;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Industri::insert([
            [
                'nama' => 'PT Botika Teknologi Indonesia',
                'bidang_usaha' => 'Start-up AI',
                'alamat' => 'Jl Perumnas Blok E III No 50, Seturan, Sleman, Yogyakarta',
                'kontak' => '0818-0220-7000',
                'email' => 'admin@botika.online',
            ],
            [
                'nama' => 'PT Gamatechno Indonesia',
                'bidang_usaha' => 'Teknologi Informasi dan Komunikasi',
                'alamat' => 'Jl. Purwomartani, Sleman, Daerah Istimewa Yogyakarta',
                'kontak' => '+62-274-566161',
                'email' => 'info@gamatechno.com',
            ],
            [
                'nama' => 'PT Murni Cahaya Pratama',
                'bidang_usaha' => 'Manufaktur Cat',
                'alamat' => 'Jl. Kp. Lio Baru, Desa No.Km. 2, Sanja, Kec. Citeureup, Kabupaten Bogor, Jawa Barat',
                'kontak' => '0858-2909-5046',
                'email' => 'info@cargloss.co.id',
            ],
            [
                'nama' => 'PT Mega Karya Mandiri',
                'bidang_usaha' => 'Manufaktur Helmet',
                'alamat' => 'Jl. Kp. Lio Baru, Desa No.Km. 2, Sanja, Kec. Citeureup, Kabupaten Bogor, Jawa Barat',
                'kontak' => '0858-2909-5046',
                'email' => 'info@cargloss.co.id',
            ],
        ]);
    }
}