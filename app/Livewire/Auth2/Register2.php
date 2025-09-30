<?php

namespace App\Livewire\Auth2;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register2 extends Component
{
    //#[Validate('required','string','max:255')]
    public $name;

    //#[Validate('required','email','unique:users,email')]
    public $email;

    //#[Validate('required','min:8','confirmed')]
    public $password;

    //#[Validate('required')]
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'guest',
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth2.register2')->extends('layouts.app')->section('content');
    }
}
