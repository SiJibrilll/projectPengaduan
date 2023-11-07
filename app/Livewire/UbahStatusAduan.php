<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\Auth;

class UbahStatusAduan extends Component
{
    #[Locked]
    public $aduan;
    private $statusList = ['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'];

    public $status;

    function mount() {
        $this->status = array_search($this->aduan->status, $this->statusList);
    }


    function ubahStatus()
    {
        // validasi role
        $user = Auth()->user();
        
        if (!$user->hasRole('admin') && !$user->hasRole('petugas')) {
            return;
        }
        // dd($this->statusList[$this->status]);

        // -- validasi data
        if (null == $this->statusList[$this->status]) {
            return;
        }
        
        // update status
        $this->aduan->update([
            'status' => $this->statusList[$this->status],
            'tanggal_selesai' => Carbon::now()
        ]);
        
    }

    public function render()
    {
        return view('livewire.ubah-status-aduan');
    }
}
