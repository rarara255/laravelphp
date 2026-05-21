<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Send extends Component
{
    public function sendMessage()
    {
        $this->emit('hello', 'Привет!');
    }

    public function render()
    {
        return view('livewire.send');
    }
}
