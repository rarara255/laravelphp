<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Receiver extends Component
{
    public $message = '';

    protected $listeners = ['hello' => 'showMessage'];

    public function showMessage($text)
    {
        $this->message = $text;
    }

}
