<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;

class Show extends Component
{
    public $industri;

    public function mount($id)
    {
        // Fetch the data based on the provided ID
        $this->industri = Industri::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.industri.show');
    }
}