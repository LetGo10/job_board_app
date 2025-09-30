<?php

namespace App\Livewire;

use Livewire\Component;

class JobSearch extends Component
{
    public $search = '';

    public function updated($property, $value)
    {
        if ($property === 'search') {
            $this->dispatch('searchUpdated', $value);
        }
    }

    public function render()
    {
        return view('livewire.job-search');
    }
}
