<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PostJob extends Component
{
    // Job Information
    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('required|string|max:255')]
    public $company = '';

    #[Validate('required|string|max:255')]
    public $location = '';

    #[Validate('required|in:remote,on-site,hybrid')]
    public $work_type = '';

    #[Validate('required|in:full-time,part-time,contract,internship,freelance')]
    public $job_type = '';

    #[Validate('nullable|string|max:255')]
    public $salary_range = '';

    #[Validate('required|string|min:50')]
    public $description = '';

    #[Validate('required|string|min:20')]
    public $requirements = '';

    public $status = 'pending';

    public function save()
    {
        // Check if user is authenticated
        if (! auth()->check()) {
            session()->flash('error', 'Please login first.');

            return;
        }

        $this->validate();

        try {
            // Create the job posting
            $job = Job::create([
                'title' => $this->title,
                'company' => $this->company,
                'location' => $this->location,
                'work_type' => $this->work_type,
                'job_type' => $this->job_type,
                'salary_range' => $this->salary_range,
                'description' => $this->description,
                'requirements' => $this->requirements,
                'status' => $this->status,
                'owner_id' => auth()->id(),
                'total_view' => 0,
            ]);

            if ($job) {
                $this->resetForm();
                session()->flash('message', 'Job posted successfully! Please activate it to make it live.');

                // Redirect to user's job list
                return $this->redirect(route('my.job.posts'));
            }

        } catch (\Exception $e) {
            \Log::error('Job creation error: '.$e->getMessage());
            session()->flash('error', 'There was an error posting the job: '.$e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->title = '';
        $this->company = '';
        $this->location = '';
        $this->work_type = '';
        $this->job_type = '';
        $this->salary_range = '';
        $this->description = '';
        $this->requirements = '';
        $this->status = 'pending';
    }

    public function cancel()
    {
        return redirect()->route('my.job.posts');
    }


    public function openModal()
    {
        $this->dispatch('openAiDescriptionModal');
    }

    #[On('aiResponseGenerated')]
    public function handleAiResponse($data)
    {
        if (isset($data['response'])) {
            $this->description = $data['response'];
            // Dispatch event untuk refresh CKEditor
            $this->dispatch('refreshEditor');
        }
    }

    public function render()
    {
        return view('livewire.post-job');
    }
}
