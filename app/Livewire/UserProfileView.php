<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UserProfileView extends Component
{
    public $showModal = false;
    public $user = null;

    #[On('viewProfile')]
    public function viewProfile($userId)
    {
        $this->user = User::find($userId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->user = null;
    }

    public function render()
    {
        return view('livewire.user-profile-view');
    }
}
