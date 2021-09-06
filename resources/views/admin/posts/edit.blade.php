<x-layout>
    <x-setting :heading="'Edit Post' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('title', $post->slug)" />
            <div class="flex mt-6">
                <x-form.input class="flex-1" name="thumbnail" type="file" :value="old('title', $post->thumbnail)" />
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="rouned-xl ml-6" width="100" alt="">
            </div>
            <x-form.textarea name="excerpt">
                {{ old('excerpt', $post->excerpt) }}
            </x-form.textarea>
            <x-form.textarea name="body" :value="old('title', $post->body)">
                {{ old('body', $post->body) }}
            </x-form.textarea>
            <x-form.field>
                <x-form.label name="category_id" />
                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
