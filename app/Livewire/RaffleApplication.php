<?php

namespace App\Livewire;

use Livewire\Component;

class RaffleApplication extends Component
{

    public ?string $email = 'Jeremias';
    public function render()
    {
        
        return view('livewire.raffle-application');
    }
}
