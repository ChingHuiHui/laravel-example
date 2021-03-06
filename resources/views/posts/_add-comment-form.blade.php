@auth
<x-panel>
    <form method="POST">
        @csrf

        <header class=" flex items-center ">
            <img src=" https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                class="rounded-full" />
            <h2 class="ml-4">Want to participate?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="5"
                placeholder="Quick, thing of something to say" required></textarea>
            @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 ">
            <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-sm py-2 px-10 rounded-2xl hover:bg-blue-600">Submit</button>
        </div>
    </form>
</x-panel>
@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register</a> or
    <a href="/login" class="hover:underline">Log in</a> to leave a comment!
</p>
@endauth
