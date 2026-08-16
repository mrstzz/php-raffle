<div>
    <label for="name" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input {{ $attributes }}
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

    @error($attributes->get('name'))
        <div class="text-red-500 text-sm mt-2">
            {{ $message }}
        </div>
    @enderror
</div>