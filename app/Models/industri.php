<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class industri extends Model
{
    protected $fillable = ['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'guru_pembimbing'];

    use HasFactory;
    
    public function pkls()
    {
        return $this->hasMany(Pkl::class, 'industri_id');
    }
}
