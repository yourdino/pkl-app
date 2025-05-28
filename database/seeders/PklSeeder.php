<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pkl;

class PklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pkl::insert([
            [
                'siswa_id' => 1,
                'industri_id' => 1,
                'guru_id' => 1,
                'mulai' => '2025-05-08',
                'selesai' => '2025-05-30',
            ],
            [
                'siswa_id' => 2,
                'industri_id' => 3,
                'guru_id' => 5,
                'mulai' => '2025-07-01',
                'selesai' => '2026-04-17',
            ],
            [
                'siswa_id' => 3,
                'industri_id' => 3,
                'guru_id' => 5,
                'mulai' => '2025-07-01',
                'selesai' => '2026-04-17',
            ],
            [
                'siswa_id' => 4,
                'industri_id' => 2,
                'guru_id' => 1,
                'mulai' => '2025-07-01',
                'selesai' => '2026-04-17',
            ],
            [
                'siswa_id' => 5,
                'industri_id' => 4,
                'guru_id' => 3,
                'mulai' => '2025-07-01',
                'selesai' => '2026-04-17',
            ],
            [
                'siswa_id' => 6,
                'industri_id' => 1,
                'guru_id' => 4,
                'mulai' => '2025-07-01',
                'selesai' => '2026-04-17',
            ],
        ]);
    }
}