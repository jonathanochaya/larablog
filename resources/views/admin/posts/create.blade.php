<x-layout>
    <x-setting heading="Publish New Post">
        <form action="{{ @route('savepost') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <x-form.input name='title' />

            <x-form.input name='slug' />

            <x-form.input name='thumbnail' type="file" />

            <x-form.textarea name='exerpt' />

            <x-form.textarea name='body' />

            <x-form.section>
                <x-form.label name='category'/>

                <select name="category_id" id="category">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id? 'selected': ''}}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name='category'/>
            </x-form.section>

            <x-form.button name='post' />

        </form>
    </x-setting>
</x-layout>
