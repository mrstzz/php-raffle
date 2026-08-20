<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class Login extends Component
{

    #[Validate(['email' => 'required|email', 'password' => 'required'])]
    public string $email = '';
    public string $password = '';


    public function handle():void
    {
        $this->validate();

        if(Auth::attempt([
            'email' => $this->email, 
            'password' => $this->password
            ], true)){


            session()->regenerate();

            $this->redirectRoute('home');
        }
        $this->addError('email', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
