<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\JobApplication;

class JobApplyView extends Component
{
    public ?JobApplication $jobsapply = null;
    public bool $showModal = false;

    #[On('viewJobApplicant')]
    public function viewJobApplicant($jobId)
    {
        $this->jobsapply = JobApplication::with('job')->find($jobId);
        $this->showModal = true;
    }

    #[On('viewJobApplicant2')]
    public function viewJobApplicant2($jobId)
    {
        $this->jobsapply = JobApplication::with('job')->find($jobId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->jobsapply = null;
    }

    public function render()
    {
        return view('livewire.job-apply-view');
    }
}
