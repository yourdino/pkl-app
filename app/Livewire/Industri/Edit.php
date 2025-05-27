<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;

class Edit extends Component
{
    public $industri_id; // To hold the id of the industri we are editing
    public $nama;
    public $bidang_usaha;
    public $alamat;
    public $kontak;
    public $email;
    public $website;

    public function mount($id)
    {
        // Fetch the existing industri data based on the provided ID
        $industri = Industri::findOrFail($id);

        // Set the properties with the existing data
        $this->industri_id = $industri->id;
        $this->nama = $industri->nama;
        $this->bidang_usaha = $industri->bidang_usaha;
        $this->alamat = $industri->alamat;
        $this->kontak = $industri->kontak;
        $this->email = $industri->email;
        $this->website = $industri->website;
    }

    public function update()
    {
        // Validate the data
        $this->validate([
            'nama' => 'required|string|max:100',
            'bidang_usaha' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'website' => 'required|url|max:255',
        ]);

        // Find and update the industri record
        $industri = Industri::findOrFail($this->industri_id);
        $industri->update([
            'nama' => $this->nama,
            'bidang_usaha' => $this->bidang_usaha,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'website' => $this->website,
        ]);

        // Flash success message and redirect
        session()->flash('success', 'Data industri berhasil diperbarui!');
        return redirect()->route('industri.index');
    }

    public function render()
    {
        return view('livewire.industri.edit');
    }
}