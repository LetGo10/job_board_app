<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    public $search = '';
    public $showDeleteModal = false;
    public $userToDelete = null;

    public function viewProfile($userId)
    {
        $this->dispatch('viewProfile', $userId);
    }

    // call modal
    public function confirmDelete($userId)
    {
        //simpan user id n use in blade
        $this->userToDelete = $userId;
        $this->showDeleteModal = true;
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
        }
        $this->closeDeleteModal();
    }

    // close modal
    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->userToDelete = null;
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.user-list', compact('users'));
    }
}
