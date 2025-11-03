<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditMyJobPosts extends Component
{
    public $jobId;

    public $job;

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

    #[Validate('required|in:pending,active,inactive,draft,closed')]
    public $status = '';

    public function mount($jobId)
    {
        $this->jobId = $jobId;

        // Admin can edit any job, regular users can only edit their own
        if (auth()->user()->can('is-admin')) {
            $this->job = Job::findOrFail($jobId);
        } else {
            $this->job = Job::where('id', $jobId)
                ->where('owner_id', auth()->id())
                ->firstOrFail();
        }

        // Load existing data
        $this->title = $this->job->title;
        $this->company = $this->job->company;
        $this->location = $this->job->location;
        $this->work_type = $this->job->work_type;
        $this->job_type = $this->job->job_type;
        $this->salary_range = $this->job->salary_range;
        $this->description = $this->job->description;
        $this->requirements = $this->job->requirements;
        $this->status = $this->job->status;
    }

    public function update()
    {
        // Check if user is authenticated
        if (! auth()->check()) {
            session()->flash('error', 'Please login first.');

            return;
        }

        $this->validate();

        try {
            // Update the job posting
            $this->job->update([
                'title' => $this->title,
                'company' => $this->company,
                'location' => $this->location,
                'work_type' => $this->work_type,
                'job_type' => $this->job_type,
                'salary_range' => $this->salary_range,
                'description' => $this->description,
                'requirements' => $this->requirements,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Job post updated successfully!');

            // Redirect back to my job posts
            return redirect()->route('my.job.posts');

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update job post. Please try again.');
        }
    }

    public function cancel()
    {
        return redirect()->route('my.job.posts');
    }

    public function render()
    {
        return view('livewire.edit-my-job-posts');
    }
}
