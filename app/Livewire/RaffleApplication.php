<?php

namespace App\Livewire;

use App\Models\Applicant;
use App\Models\Raffle;

use Livewire\Component;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;

class RaffleApplication extends Component
{

    public ?Raffle $raffle = null;
    public ?string $email = null;
    public bool $success = false;
    public ?string $winner = null;
    public function mount(): void
    {

        $this->raffle = Raffle::first();

    }

    public function rules(): array
    {

        return [

            'email' => [

                'required',

                'email',

                Rule::unique('applicants', 'email')->where('raffle_id', $this->raffle->id)

            ]

        ];

    }

    public function save(): void
    {

        $this->validate();

        Applicant::create([

            'raffle_id' => $this->raffle->id,

            'email' => $this->email

        ]);

        $this->success = true;

    }

    #[Computed]
    public function participants(): Collection
    {

        return $this->raffle->applicants->map(

            fn($applicant) =>

            preg_replace("/(?<=.{2}).(?=.*@)/u", '*', $applicant->email)

        );

    }


    public function getWinner(): void
    {

        $winner = $this->raffle->applicants()->inRandomOrder()->first();

        $this->winner = $winner->email;

    }

    public function render(): View
    {
        return view('livewire.raffle-application');
    }
}