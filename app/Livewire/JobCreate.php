<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\On;

class JobCreate extends Component
{
    public $title;
    public $company;
    public $location;
    public $description;
    public $showModal = false;

    #[On('open-job-modal')]
    public function openModal()
    {
        $this->clear();
        $this->showModal = true;
    }

    public function save()
    {
        $job = Job::create([
            'title' => $this->title,
            'company' => $this->company,
            'location' => $this->location,
            'description' => $this->description,
            'owner_id' => auth()->id(),
        ]);

        $this->dispatch('jobCreated', $job->id);
        $this->closeModal();

        // Redirect to checkout with job_id parameter
        return redirect()->route('checkout', ['job_id' => $job->id]);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->clear();
    }

    public function clear()
    {
        $this->title = '';
        $this->company = '';
        $this->location = '';
    }

    public function render()
    {
        return view('livewire.job-create');
    }
}
