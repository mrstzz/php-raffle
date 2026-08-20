<x-ui.card>

    <h1 class="text-2xl font-bold mb-4">Login</h1>

    <form wire:submit="handle" class="space-y-4">

        <x-ui.input label="Email" name="email" wire:model="email" type="email" />

        <x-ui.input label="Password" name="password" wire:model="password" type="password" />

        <x-ui.button type="submit" class="mt-4">Login</x-ui.button>

    </form>

</x-ui.card>