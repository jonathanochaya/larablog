@props(['heading'])

<x-panel>
    <h1 class="text-lg font-bold mb-10 pb-2 border-b">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="{{ @route('adminposts') }}" class="{{ request()->routeIs('adminposts')? 'text-blue-500 font-semibold': '' }}">All Posts</a>
                </li>
                <li>
                    <a href="{{ @route('newpost') }}" class="{{ request()->routeIs('newpost')? 'text-blue-500 font-semibold': '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</x-panel>
