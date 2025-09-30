<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function mount()
    {
        if (! auth()->check()) {
            return redirect()->route('login2');
        }

        // if user login tapi bukan admin
        if (! auth()->user()->can('is-admin')) {
            abort(403, 'Unauthorized');
        }
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
