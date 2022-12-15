<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Larasub extends Component
{
    public $email;

    public function subscribe()
    {
        \Log::debug($this->email);
    }

    public function render()
    {
        return view('livewire.larasub');
    }
}
