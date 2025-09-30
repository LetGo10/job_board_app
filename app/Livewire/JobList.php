<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\On;

class JobList extends Component
{
    public $jobs = [];
    public $currentSearch = '';
    public $showDeleteModal = false;
    public $jobToDelete = null;

    public function mount()
    {
        $this->jobs = Job::all();
    }

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
        $this->jobs = Job::all();
    }

    #[On('jobCreated')]
    public function handleJobCreated($jobId)
    {
        //$this->jobs[] = Job::find($jobId);
        $this->refreshJobs();
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
            $this->jobs = $this->jobs->filter(fn($j) => $j->id !== $jobId);
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
        $this->refreshJobs();
    }

    protected function refreshJobs()
    {
        if (empty($this->currentSearch)) {
            $this->jobs = Job::latest()->get();
        } else {
            $this->jobs = Job::where('title', 'like', '%' . $this->currentSearch . '%')
                ->orWhere('company', 'like', '%' . $this->currentSearch . '%')
                ->orWhere('location', 'like', '%' . $this->currentSearch . '%')
                ->latest()
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.job-list');
    }
}
