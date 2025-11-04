<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    public $jobs = [];
    public $currentSearch = '';
    public $showDeleteModal = false;
    public $jobToDelete = null;
    public $perPage = 6;

    public function mount()
    {
        $this->refreshJobs();
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
        $this->refreshJobs();
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
            $this->refreshJobs();
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
            $this->jobs = Job::where('status', 'active')->latest()->get();
        } else {
            $this->jobs = Job::where('status', 'active')
                ->where(function($query) {
                    $query->where('title', 'like', '%' . $this->currentSearch . '%')
                          ->orWhere('company', 'like', '%' . $this->currentSearch . '%')
                          ->orWhere('location', 'like', '%' . $this->currentSearch . '%');
                })
                ->latest()
                ->get();
        }
    }

    public function render()
    {
        // Paginate the jobs collection
        $paginatedJobs = collect($this->jobs)->forPage(
            request()->get('page', 1), 
            $this->perPage
        );
        
        return view('livewire.job-list', [
            'jobs' => $paginatedJobs,
            'totalJobs' => count($this->jobs)
        ]);
    }
}
