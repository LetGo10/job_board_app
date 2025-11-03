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

    public function render()
    {
        $jobs = Job::with('user')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('company', 'like', '%'.$this->search.'%')
                    ->orWhere('location', 'like', '%'.$this->search.'%');
            })
            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin-job-management', compact('jobs'));
    }
}
