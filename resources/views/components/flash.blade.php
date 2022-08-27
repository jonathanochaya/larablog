@if(session()->has('message'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show" class="bg-blue-500 text-white text-sm fixed bottom-3 right-3 py-2 px-4 rounded-lg">
        <p>{{ session('message') }}</p>
    </div>
@endif
