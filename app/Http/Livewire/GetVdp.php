<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GetVdp extends Component
{
    public $vehicle;

    public function mount()
    {
        // this needs to be feed by Service class
        $this->vehicle = [];
    }

    public function render()
    {
        return view('livewire.get-vdp');
    }
}
