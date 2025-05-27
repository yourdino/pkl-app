<?php

namespace App\Livewire\Pkl;

use App\Models\Pkl;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $query = Pkl::with(['siswa', 'guru', 'industri'])->orderBy('created_at', 'asc');

        if ($this->search !== null) {
            $query->whereHas('siswa', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            })->orWhereHas('guru', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            })->orWhereHas('industri', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.pkl.index', [
            'pkls' => $query->paginate(5),
        ]);
    }

    public function destroy($id)
    {
        // Find the record and delete
        $pkl = Pkl::findOrFail($id);
        $pkl->delete();

        // Optionally, you can add a session flash to notify the user
        session()->flash('message', 'Data PKL berhasil di hapus!');
    }
}