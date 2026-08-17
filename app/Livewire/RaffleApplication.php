<?php

namespace App\Livewire;

use Livewire\Component;

class RaffleApplication extends Component
{

    public ?string $email = 'Jeremias';
    public bool $success = false;
    public function render()
    {
        
        return view('livewire.raffle-application');
    }

    public function save(){
        $this->success = true;
    }
}
