<?php

namespace App\Livewire\Auth2;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login2 extends Component
{
    // #[Validate('required','email')]
    public $email;

    // #[Validate('required','min:8')]
    public $password;

    public $remember;

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            return redirect()->route('home');
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }

    public function render()
    {
        return view('livewire.auth2.login2')->layout('layouts.app');
    }
}
