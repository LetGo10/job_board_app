<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MyJobPosts extends Component
{
    use WithPagination;

    public $search = '';

    public $statusFilter = 'all';

    public $typeFilter = 'all';

    public $activeTab = 'all';

    public $showActivateModal = false;

    public $jobToActivate = null;

    public $showDeleteModal = false;

    public $jobToDelete = null;

    #[On('myJobsSearchUpdated')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('myJobsStatusUpdated')]
    public function updateStatusFilter($status)
    {
        $this->statusFilter = $status;
        $this->resetPage();
    }

    #[On('myJobsTypeUpdated')]
    public function updateTypeFilter($type)
    {
        $this->typeFilter = $type;
        $this->resetPage();
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function confirmDelete($jobId)
    {
        $this->jobToDelete = $jobId;
        $this->showDeleteModal = true;
    }

    public function confirmDeleteJob()
    {
        if ($this->jobToDelete) {
            $job = Job::where('id', $this->jobToDelete)
                ->where('owner_id', auth()->id())
                ->first();

            if ($job) {
                $job->delete();
                session()->flash('message', 'Job deleted successfully.');
            }
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

    public function render()
    {
        $jobs = Job::where('owner_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%'.$this->search.'%')
                        ->orWhere('company', 'like', '%'.$this->search.'%')
                        ->orWhere('location', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when($this->typeFilter !== 'all', function ($query) {
                $query->where('job_type', $this->typeFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.my-job-posts', compact('jobs'));
    }
}
