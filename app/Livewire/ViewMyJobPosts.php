<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewMyJobPosts extends Component
{
    public $jobId;

    public $job;

    public $showModal = false;

    #[On('openJobView')]
    public function openModal($jobId)
    {
        $this->jobId = $jobId;
        $this->loadJob();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->job = null;
        $this->jobId = null;
    }

    public function loadJob()
    {
        if ($this->jobId) {
            // Admin can view all jobs, regular users can only view their own jobs
            if (auth()->user()->can('is-admin')) {
                $this->job = Job::find($this->jobId);
            } else {
                $this->job = Job::where('id', $this->jobId)
                    ->where('owner_id', auth()->id())
                    ->first();
            }

            if (! $this->job) {
                session()->flash('error', 'Job not found or you do not have permission to view it.');
                $this->closeModal();
            }
        }
    }

    public function render()
    {
        return view('livewire.view-my-job-posts');
    }
}
