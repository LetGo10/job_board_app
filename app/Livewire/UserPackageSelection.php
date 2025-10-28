<?php

namespace App\Livewire;

use Livewire\Component;

class UserPackageSelection extends Component
{
    public $packages;

    public function mount()
    {
        $this->packages = [
            [
                'id' => 1,
                'name' => 'Basic',
                'price' => 'RM 99',
                'features' => ['Post up to 5 jobs', 'Basic tracking', 'Email support'],
                'popular' => false,
            ],
            [
                'id' => 2,
                'name' => 'Professional',
                'price' => 'RM 199',
                'features' => ['Post up to 20 jobs', 'Advanced tracking', 'Priority support', 'Analytics'],
                'popular' => true,
            ],
            [
                'id' => 3,
                'name' => 'Enterprise',
                'price' => 'RM 399',
                'features' => ['Unlimited jobs', 'Full management', '24/7 support', 'Dedicated manager'],
                'popular' => false,
            ],
        ];
    }

    public function render()
    {
        return view('livewire.user-package-selection');
    }
}
