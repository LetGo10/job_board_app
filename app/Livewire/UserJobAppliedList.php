<?php

namespace App\Livewire;

use App\Models\JobApplication;
use Livewire\Component;

class UserJobAppliedList extends Component
{
    public function viewJobApplicant2($jobId)
    {
        $this->dispatch('viewJobApplicant2', $jobId);
    }

    public function render()
    {
        // Ambil job applications untuk user yang login sahaja
        $applications = JobApplication::with(['job'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.user-job-applied-list', [
            'applications' => $applications,
        ]);
    }
}
