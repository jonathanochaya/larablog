@props(['name'])

<x-form.section>
    <x-form.label :name="$name" />

    <textarea class="border border-gray-400 p-2 w-full text-sm focus:outline-none focus:ring" name="{{ $name }}" id="{{ $name }}" cols="10" rows="4" required>{{ $slot ?? old($name) }}</textarea>

    <x-form.error :name="$name" />
</x-form.section>
