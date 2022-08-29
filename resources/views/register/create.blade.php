<x-layout>
    <x-auth-section name='register'>
        <form method="POST" action="{{ @route('register') }}" class="mt-5">
            @csrf

            <x-form.input name='name' />

            <x-form.input name='username' />

            <x-form.input name='email' type='email' />

            <x-form.input name='password' type='password' />

            <x-form.button name='submit' />
        </form>
    </x-auth-section>
</x-layout>
