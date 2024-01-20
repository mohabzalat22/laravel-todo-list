<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    // props
    public $count = 0;
    // end props

    public function increment()
    {
        $this->count ++;
    }

    public function decrement()
    {
        $this->count --;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
