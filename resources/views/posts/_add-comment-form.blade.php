@auth
    <form action="{{ @route('comment', $post->slug) }}" method="POST" class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex items-center mb-5 space-x-4">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2>Want to participate?</h2>
        </header>

        <div>
            <textarea placeholder="Quick, think of something to say!" class="border border-gray-400 p-2 w-full text-sm focus:outline-none focus:ring" name="body" id="body" cols="10" rows="4" required></textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end mt-5">
            <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a class="hover:underline" href="{{ @route('register') }}">Register</a> or <a class="hover:underline" href="{{ @route('login') }}">Log in</a> to leave a comment!
    </p>
@endauth
