<?php

namespace App\Livewire;

use Livewire\Component;

class JobSearchApply extends Component
{
    public $searchjobapplicant = '';

    public function updated($property, $value)
    {
        if ($property === 'searchjobapplicant') {
            $this->dispatch('searchUpdated', $value);
        }
    }

    public function render()
    {
        return view('livewire.job-search-apply');
    }
}
