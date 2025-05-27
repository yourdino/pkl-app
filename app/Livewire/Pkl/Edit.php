<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Edit extends Component
{
    public $pklId, $siswa_id, $industri_id, $guru_id, $mulai, $selesai;

    public $siswaList, $guruList, $industriList;

    public function mount($id)
    {
        // Retrieve the specific PKL record based on the provided id
        $pkl = Pkl::find($id);

        if ($pkl) {
            $this->pklId = $pkl->id;
            $this->siswa_id = $pkl->siswa_id;
            $this->industri_id = $pkl->industri_id;
            $this->guru_id = $pkl->guru_id;
            $this->mulai = $pkl->mulai;
            $this->selesai = $pkl->selesai;
        }

        // Load the lists for Siswa, Guru, and Industri
        $this->siswaList = Siswa::all();
        $this->guruList = Guru::all();
        $this->industriList = Industri::all();
    }

    public function update()
    {
        $this->validate([
            'siswa_id' => 'required|integer',
            'industri_id' => 'required|integer',
            'guru_id' => 'required|integer',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        // Update the specific PKL record
        $pkl = Pkl::find($this->pklId);

        if ($pkl) {
            $pkl->update([
                'siswa_id' => $this->siswa_id,
                'industri_id' => $this->industri_id,
                'guru_id' => $this->guru_id,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            session()->flash('success', 'Data PKL berhasil diperbarui!');
            return redirect()->route('pkl.index');
        }
    }

    public function render()
    {
        return view('livewire.pkl.edit', [
            'siswaList' => $this->siswaList,
            'guruList' => $this->guruList,
            'industriList' => $this->industriList,
        ]);
    }
}