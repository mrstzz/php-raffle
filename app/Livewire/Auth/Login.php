<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;

class Login extends Component
{

    #[Validate(['email' => 'required|email', 'password' => 'required'])]
    public string $email = '';
    public string $password = '';


    public function handle():void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if(!Auth::attempt(['email' => $this->email, 'password' => $this->password], true)){

            throw ValidationException::withMessages([

                'email' => __('auth.failed'),

            ]);
        }

        
        RateLimiter::clear($this->rateKey());
        Session::regenerate();
        $this->redirectRoute('home');
    }




    private function ensureIsNotRateLimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->rateKey(), 5)) {

            $seconds = RateLimiter::availableIn($this->rateKey());

            throw ValidationException::withMessages([

                'email' => 'Too many login attempts. Please try again in ' . $seconds . ' seconds.',

            ]);

        }

        RateLimiter::hit($this->rateKey());

    }

    private function rateKey(): string
    {
        return str($this->email . '|' . request()->ip())
        ->replace('@', '_at_')
        ->replace('.', '__')
        ->slug();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
