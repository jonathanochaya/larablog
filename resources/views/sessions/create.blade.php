<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form action="{{ @route('login') }}" method="post">
                @csrf

                @error('failed')
                    <p class="text-center text-red-500 text-xs mt-3 mb-3">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input type="email"
                        class="border border-gray-400 p-2 w-full"
                        name="email" id="email" value="{{ old('email') }}" />
                </div>

                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>

                    <input type="password"
                        class="border border-gray-400 p-2 w-full"
                        name="password" id="password" />
                </div>

                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Login</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
