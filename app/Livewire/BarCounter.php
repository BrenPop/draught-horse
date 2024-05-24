<?php

namespace App\Livewire;

use Livewire\Component;

class BarCounter extends Component
{
    public $percentageChange;
    public $title;
    public $barCount;

    public function mount($title = 'placeholder', $percentageChange = 0, $barCount = 0)
    {
        $this->percentageChange = $percentageChange;
        $this->title = $title;
        $this->barCount = $barCount;
    }

    public function render()
    {
        return view('livewire.bar.bar-counter');
    }
}
