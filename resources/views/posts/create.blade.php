<x-layout>
    <section class="px-6 py-8 max-w-lg mx-auto mt-6">
        <h1 class="text-lg font-bold mb-10">
            Publish New Post
        </h1>

        <form action="{{ @route('savepost') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Title
                </label>

                <input type="text" class="border border-gray-400 p-2 w-full"
                    name="title" id="title" value="{{ old('title') }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Slug
                </label>

                <input type="text" class="border border-gray-400 p-2 w-full"
                    name="slug" id="slug" value="{{ old('slug') }}" />

                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Thumbnail
                </label>

                <input type="file" class="border border-gray-400 p-2 w-full"
                    name="thumbnail" id="thumbnail" required/>

                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <textarea class="border border-gray-400 p-2 w-full text-sm focus:outline-none focus:ring" name="exerpt" id="exerpt" cols="10" rows="4" required>{{ old('exerpt') }}</textarea>
                @error('exerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <textarea class="border border-gray-400 p-2 w-full text-sm focus:outline-none focus:ring" name="body" id="body" cols="10" rows="4" required>{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Category
                </label>

                <select name="category_id" id="category">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id? 'selected': ''}}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end mt-5">
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
            </div>

        </form>
    </section>
</x-layout>
