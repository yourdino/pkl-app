<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email'];
}
