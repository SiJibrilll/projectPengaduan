<?php

namespace App\Livewire;

use App\Models\Aduan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KelolaAduan extends Component
{   

    public $aduan = [];
    public $selected = 'diajukan';
    public $jumlahDiajukan = 0;
    public $jumlahDiterima = 0;
    public $jumlahDiproses = 0;
    public $jumlahSelesai = 0;
    public $jumlahDitolak = 0;
    
    // -- to set inital state
    function mount() {
        $this->aduan = Aduan::where('status', 'diajukan')->get();

        $this->jumlahDiajukan =  Aduan::where('status', 'diajukan')->count();
        $this->jumlahDiterima =  Aduan::where('status', 'diterima')->count();
        $this->jumlahDiproses =  Aduan::where('status', 'diproses')->count();
        $this->jumlahSelesai =  Aduan::where('status', 'selesai')->count();
        $this->jumlahDitolak =  Aduan::where('status', 'ditolak')->count();
    }

    // -- method to check if request comes from admin or petugas
    private function adminCheck() {
        if (Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('petugas')) {
            return true;
        }

        return false;
    }

    // -- method to return aduan based on a parameter
    function getAduan($status) {
        if (!$this->adminCheck()) {
            return;
        }
        
        $this->selected = $status;
        $this->aduan = Aduan::where('status', $status)->get();
    }

    public function render()
    {
        return view('livewire.kelola-aduan');
    }
}
