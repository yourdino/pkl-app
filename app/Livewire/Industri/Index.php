<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $query = Industri::orderBy('created_at', 'asc');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
                ->orWhere('alamat', 'like', '%' . $this->search . '%')
                ->orWhere('kontak', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('website', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.industri.index', [
            'industris' => $query->paginate(3),
        ]);
    }

    public function destroy($id)
    {
        $industri = Industri::findOrFail($id);
        $industri->delete();
        
        session()->flash('message', 'Data industri berhasil di hapus!');
    }
}