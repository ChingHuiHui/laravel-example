<x-layout>
    <section>
        <x-panel class="max-w-sm mx-auto">
            <form action="/admin/posts" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" required>

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" required>

                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="exceprt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt" required>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" required>
                    </textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
