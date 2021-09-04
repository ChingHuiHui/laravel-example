<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
        <x-posts-grid :posts="$posts" />

        {{ $posts->links()}}
        @else
        <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    </main>



    {{-- <section class="container space-y-5 divide-y divide-gray-300">
    @foreach ($posts as $post)
      <article class="px-10 py-5">
        <h1><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
    <p>
        By <a href="/authors/{{ $post->author->username }}" class="text-blue-500">{{$post->author->name}}</a>in
        <a class="underline text-green-400" href="/categories/{{ $post->category->slug }}">
            {{ $post->category->name}}
        </a>
    </p>
    <p>
        {{ $post->excerpt }}
    </p>
    </article>
    @endforeach
    </section> --}}
</x-layout>
