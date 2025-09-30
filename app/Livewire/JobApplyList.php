<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\JobApplication;

class JobApplyList extends Component
{
    public $jobsapply= [];
    public $currentSearch = '';

    public function mount()
    {
        //$this->jobsapply = JobApplication::all();
        $this->jobsapply = JobApplication::with('job')->get();
    }

    #[On('searchUpdated')]
    public function handleSearchUpdated($searchjobapplicant)
    {
        $this->currentSearch = $searchjobapplicant;
        $this->refreshJobs();
    }

    protected function refreshJobs()
    {
        if (empty($this->currentSearch)) {
            $this->jobsapply = JobApplication::with('job')->latest()->get();
        } else {
            $search = $this->currentSearch;

            $this->jobsapply = JobApplication::with('job')
                ->where(function ($query) use ($search) {
                    $query->where('full_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone_number', 'like', "%{$search}%");
                })
                ->orWhereHas('job', function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%");
                })
                ->latest()
                ->get();
        }
    }

    public function viewJobApplicant($jobId)
    {
        $this->dispatch('viewJobApplicant', $jobId);
    }

    public function render()
    {
        return view('livewire.job-apply-list');
    }
}
