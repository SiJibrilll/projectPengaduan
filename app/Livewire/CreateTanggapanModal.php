<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateTanggapanModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-tanggapan-modal');
    }
}
