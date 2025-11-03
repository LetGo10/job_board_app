<?php

namespace App\Livewire;

use Livewire\Component;

class JobSearchMyPosts extends Component
{
    public $search = '';

    public $statusFilter = 'all';

    public $typeFilter = 'all';

    public function updatedSearch()
    {
        $this->dispatch('myJobsSearchUpdated', $this->search);
    }

    public function updatedStatusFilter()
    {
        $this->dispatch('myJobsStatusUpdated', $this->statusFilter);
    }

    public function updatedTypeFilter()
    {
        $this->dispatch('myJobsTypeUpdated', $this->typeFilter);
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->dispatch('myJobsSearchUpdated', '');
    }

    public function clearAllFilters()
    {
        $this->search = '';
        $this->statusFilter = 'all';
        $this->typeFilter = 'all';
        $this->dispatch('myJobsSearchUpdated', '');
        $this->dispatch('myJobsStatusUpdated', 'all');
        $this->dispatch('myJobsTypeUpdated', 'all');
    }

    public function render()
    {
        return view('livewire.job-search-my-posts');
    }
}
