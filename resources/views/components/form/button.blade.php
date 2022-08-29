@props(['name'])

<div class="flex justify-end mt-5">
    <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">{{ ucwords($name) }}</button>
</div>
