<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    protected $fillable = ['siswa_id', 'guru_id', 'industri_id', 'mulai', 'selesai'];

    // Relasi ke tabel siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke tabel guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Relasi ke tabel industri
    public function industri()
    {
        return $this->belongsTo(Industri::class);
    }
}
