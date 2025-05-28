<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil siswa berdasarkan user login
        $siswa = $user->siswa; // pastikan relasi 'siswa' ada di model User

        // Ambil data PKL jika siswa ditemukan
        $pkls = $siswa ? $siswa->pkls()->with(['industri', 'guru'])->get() : collect();

        return view('dashboard', compact('user', 'siswa', 'pkls'));
    }
}