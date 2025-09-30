<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\On;

class JobView extends Component
{
    public ?Job $job = null;
    public bool $showModal = false;

    #[On('viewJob')]
    public function viewJob($jobId)
    {
        $this->job = Job::find($jobId);
        $this->showModal = true;
    }

    public function applyForJob($jobId)
    {
        $this->dispatch('applyForJob', $jobId);
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->job = null;
    }


    public function render()
    {
        return view('livewire.job-view');
    }
}
