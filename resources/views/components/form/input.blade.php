@props(['name', 'type'=>'text'])

<x-form.section>
    <x-form.label :name="$name" />

    <input type="{{ $type }}" class="border border-gray-400 p-2 w-full"
        name="{{ $name}}" id="{{ $name}}" value="{{ old($name) }}" />

    <x-form.error :name="$name" />
</x-form.section>
