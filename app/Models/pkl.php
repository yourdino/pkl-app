<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pkl extends Model
{
    protected $fillable = ['siswa_id', 'guru_id', 'industri_id', 'mulai', 'selesai'];
}
