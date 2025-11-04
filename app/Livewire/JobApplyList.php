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
        // Admin: lihat semua applications
        // Author: hanya lihat applications untuk jobs yang dia create (owner_id)
        if (auth()->user()->can('is-admin')) {
            $this->jobsapply = JobApplication::with('job')->get();
        } else {
            // Hanya ambil applications untuk jobs yang user ini create (based on owner_id)
            $this->jobsapply = JobApplication::with('job')
                ->whereHas('job', function($query) {
                    $query->where('owner_id', auth()->id());
                })
                ->get();
        }
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
            // Admin: lihat semua, Author: hanya job sendiri
            if (auth()->user()->can('is-admin')) {
                $this->jobsapply = JobApplication::with('job')->latest()->get();
            } else {
                $this->jobsapply = JobApplication::with('job')
                    ->whereHas('job', function($query) {
                        $query->where('owner_id', auth()->id());
                    })
                    ->latest()
                    ->get();
            }
        } else {
            $search = $this->currentSearch;

            // Build base query
            $query = JobApplication::with('job')
                ->where(function ($q) use ($search) {
                    $q->where('full_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone_number', 'like', "%{$search}%");
                })
                ->orWhereHas('job', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%");
                });

            // Filter by author if not admin (based on owner_id)
            if (!auth()->user()->can('is-admin')) {
                $query->whereHas('job', function($q) {
                    $q->where('owner_id', auth()->id());
                });
            }

            $this->jobsapply = $query->latest()->get();
        }
    }

    public function viewJobApplicant($jobId)
    {
        $this->dispatch('viewJobApplicant', $jobId);
    }

    public function hireApplicant($applicationId)
    {
        try {
            $application = JobApplication::find($applicationId);
            
            if ($application) {
                $application->update(['status' => 'hired']);
                
                // Update the local collection to reflect changes immediately
                $this->refreshJobs();
                
                session()->flash('message', 'Applicant hired successfully!');
            } else {
                session()->flash('error', 'Applicant not found.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to hire applicant. Please try again.');
        }
    }

    public function rejectApplicant($applicationId)
    {
        try {
            $application = JobApplication::find($applicationId);
            
            if ($application) {
                $application->update(['status' => 'rejected']);
                
                // Update the local collection to reflect changes immediately
                $this->refreshJobs();
                
                session()->flash('message', 'Applicant rejected.');
            } else {
                session()->flash('error', 'Applicant not found.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to reject applicant. Please try again.');
        }
    }

    public function reconsiderApplicant($applicationId)
    {
        try {
            $application = JobApplication::find($applicationId);
            
            if ($application) {
                $application->update(['status' => 'pending']);
                
                // Update the local collection to reflect changes immediately
                $this->refreshJobs();
                
                session()->flash('message', 'Applicant moved back to pending for reconsideration.');
            } else {
                session()->flash('error', 'Applicant not found.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to reconsider applicant. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.job-apply-list');
    }
}
