<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJobManagement extends Component
{
    use WithPagination;

    public $search = '';

    public $statusFilter = 'all';

    public $activeTab = 'all';

    public $showDeleteModal = false;

    public $jobToDelete = null;

    public $showActivateModal = false;

    public $jobToActivate = null;

    #[On('searchUpdated')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('filterUpdated')]
    public function updateFilter($filter)
    {
        $this->statusFilter = $filter;
        $this->activeTab = $filter; // Sync the tab with the filter
        $this->resetPage();
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->statusFilter = $tab; // Sync the filter with the tab
        $this->resetPage();
    }

    public function confirmDelete($jobId)
    {
        $this->jobToDelete = $jobId;
        $this->showDeleteModal = true;
    }

    public function deleteJob()
    {
        if ($this->jobToDelete) {
            $job = Job::findOrFail($this->jobToDelete);
            $job->delete();

            session()->flash('message', 'Job deleted successfully.');
            $this->resetPage();
        }

        $this->closeDeleteModal();
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->jobToDelete = null;
    }

    public function confirmActivate($jobId)
    {
        $this->jobToActivate = $jobId;
        $this->showActivateModal = true;
    }

    public function proceedToPayment()
    {
        if ($this->jobToActivate) {
            return redirect()->route('checkout', ['job_id' => $this->jobToActivate]);
        }
    }

    public function closeActivateModal()
    {
        $this->showActivateModal = false;
        $this->jobToActivate = null;
    }

    public function confirmReject($jobId)
    {
        if ($job = Job::find($jobId)) {
            $job->update(['status' => 'rejected']);
            session()->flash('message', 'Job has been rejected.');
            $this->resetPage();
        }
    }

    public function confirmDeactivate($jobId)
    {
        if ($job = Job::find($jobId)) {
            $job->update(['status' => 'inactive']);
            session()->flash('message', 'Job has been deactivated.');
            $this->resetPage();
        }
    }

    public function render()
    {
        // Base query with relationships
        $baseQuery = Job::with('user');
        
        // Apply status filter (works for both dropdown filter and tab clicks)
        $currentFilter = $this->statusFilter !== 'all' ? $this->statusFilter : $this->activeTab;
        if ($currentFilter !== 'all') {
            $baseQuery->where('status', $currentFilter);
        }
        
        // Then apply search within the filtered results
        if ($this->search) {
            $baseQuery->where(function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                      ->orWhere('company', 'like', '%'.$this->search.'%')
                      ->orWhere('location', 'like', '%'.$this->search.'%')
                      ->orWhere('job_type', 'like', '%'.$this->search.'%')
                      ->orWhere('work_type', 'like', '%'.$this->search.'%')
                      ->orWhere('description', 'like', '%'.$this->search.'%');
            });
        }
        
        // Get paginated jobs for display
        $jobs = $baseQuery->orderBy('created_at', 'desc')->paginate(10);

        // Get total counts for statistics (from all jobs, not just paginated)
        $allJobsQuery = Job::when($this->search, function ($query) {
            $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('company', 'like', '%'.$this->search.'%')
                ->orWhere('location', 'like', '%'.$this->search.'%');
        });

        $totalCounts = [
            'all' => $allJobsQuery->count(),
            'pending' => $allJobsQuery->clone()->where('status', 'pending')->count(),
            'active' => $allJobsQuery->clone()->where('status', 'active')->count(),
            'inactive' => $allJobsQuery->clone()->where('status', 'inactive')->count(),
        ];

        return view('livewire.admin-job-management', compact('jobs', 'totalCounts'));
    }
}
