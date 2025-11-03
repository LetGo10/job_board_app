<?php

namespace App\Livewire;

use Livewire\Component;

class AdminJobSearch extends Component
{
    public $search = '';

    public $statusFilter = 'all';

    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }

    public function updatedStatusFilter()
    {
        $this->dispatch('filterUpdated', $this->statusFilter);
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->dispatch('searchUpdated', '');
    }

    public function clearFilter()
    {
        $this->statusFilter = 'all';
        $this->dispatch('filterUpdated', 'all');
    }

    public function render()
    {
        return view('livewire.admin-job-search');
    }
}
