<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ubah kolom status_pkl menjadi ENUM
        DB::statement("ALTER TABLE siswas MODIFY COLUMN status_pkl ENUM('Sedang', 'Belum') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan kolom status_pkl ke boolean
        DB::statement("ALTER TABLE siswas MODIFY COLUMN status_pkl BOOLEAN NOT NULL");
    }
};
