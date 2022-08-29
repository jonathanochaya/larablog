<x-layout>
    <x-setting :heading="'Edit Post - ' . $post->title">
        <form action="{{ @route('updatepost', $post->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')

            <x-form.input name='title' :value="old('title', $post->title)" />

            <x-form.input name='slug' :value="old('slug', $post->slug)" />

            <x-form.input name='thumbnail' type="file" :value="$post->thumbnail" />

            <x-form.textarea name='exerpt'>{{ old('exerpt', $post->exerpt) }}</x-form.textarea>

            <x-form.textarea name='body'>{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.section>
                <x-form.label name='category'/>

                <select name="category_id" id="category">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id? 'selected': ''}}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name='category'/>
            </x-form.section>

            <x-form.button name='update' />
        </form>
    </x-setting>
</x-layout>
