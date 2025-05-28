<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\Attributes\Validate;

class Create extends Component
{
    public $nama;
    public $bidang_usaha;
    public $alamat;
    public $kontak;
    public $email;

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'bidang_usaha' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|max:100',
        ]);

        Industri::create([
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Data industri berhasil ditambahkan!');
        return redirect()->route('industri.index');
    }

    public function render()
    {
        return view('livewire.industri.create');
    }
}