<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\JobApplication;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $totalJobsApply = 0;

    public $totalJobs = 0;

    public function mount()
    {
        if (! auth()->check()) {
            return redirect()->route('login2');
        }

        // if user login tapi bukan admin
        if (! auth()->user()->can('is-admin')) {
            abort(403, 'Unauthorized');
        }

        $this->totalJobs = Job::count();
        $this->totalJobsApply = JobApplication::count();
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
