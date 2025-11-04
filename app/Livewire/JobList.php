<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    public $currentSearch = '';
    public $showDeleteModal = false;
    public $jobToDelete = null;

    public function viewJob($jobId)
    {
        $this->dispatch('viewJob', $jobId);
    }

    public function editJob($jobId)
    {
        $this->dispatch('editJob', $jobId);
    }

    #[On('jobUpdated')]
    public function handleJobUpdated()
    {
        $this->resetPage();
    }

    #[On('jobCreated')]
    public function handleJobCreated($jobId)
    {
        $this->resetPage();
    }

    // call modal
    public function confirmDelete($jobId)
    {
        //simpan jod id n use in blade
        $this->jobToDelete = $jobId;
        $this->showDeleteModal = true;
    }

    public function deleteJob($jobId)
    {
        $job = Job::find($jobId);
        if ($job) {
            $job->delete();
            $this->resetPage();
        }
        $this->closeDeleteModal();
    }

    // close modal
    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->jobToDelete = null;
    }

    #[On('searchUpdated')]
    public function handleSearchUpdated($search)
    {
        $this->currentSearch = $search;
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::where('status', 'active') // Only active jobs
            ->when($this->currentSearch, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->currentSearch . '%')
                      ->orWhere('company', 'like', '%' . $this->currentSearch . '%')
                      ->orWhere('location', 'like', '%' . $this->currentSearch . '%');
                });
            })
            ->latest()
            ->paginate(6); // 6 jobs per page

        return view('livewire.job-list', compact('jobs'));
    }
}
