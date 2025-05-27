<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;

class Show extends Component
{
    public $pkl;

    public function mount($id)
    {
        // Fetch the data based on the provided ID
        $this->pkl = Pkl::with('siswa', 'guru', 'industri')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pkl.show');
    }
}