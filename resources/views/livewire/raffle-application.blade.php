<div>

    <form wire:submit="$refresh">

        <x-ui.input 
            label="Enter your email" 
            name="email" 
            wire:model="email" 
        />

        {{ $email }}
        <x-ui.button type="submit" class="mt-4">Submit</x-ui.button>

    </form>

</div>