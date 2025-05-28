<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable = ['nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'status_pkl', 'foto'];

    use HasFactory;
    
    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
