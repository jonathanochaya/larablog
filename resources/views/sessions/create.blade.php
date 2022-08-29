<x-layout>
    <x-auth-section name='log in'>
        <form action="{{ @route('login') }}" method="POST">
            @csrf

            @error('failed')
                <p class="text-center text-red-500 text-xs mt-3 mb-3">{{ $message }}</p>
            @enderror

            <x-form.input name='email' />

            <x-form.input name='password' type='password' />

            <x-form.button name='login' />
        </form>
    </x-auth-section>
</x-layout>
